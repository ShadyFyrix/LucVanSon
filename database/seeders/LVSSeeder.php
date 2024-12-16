<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LVSSeeder extends Seeder
{
    /**
     * Chạy các seed dữ liệu vào cơ sở dữ liệu.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed lvs_nhacc (Nhà cung cấp) - Đảm bảo MaNCC duy nhất
        foreach (range(1, 10) as $index) {
            do {
                $maNCC = $faker->unique()->bothify('###');
            } while (DB::table('lvs_nhacc')->where('lvs_MaNCC', $maNCC)->exists());

            DB::table('lvs_nhacc')->insert([
                'lvs_MaNCC' => $maNCC,
                'lvs_TenNCC' => $faker->company,
                'lvs_Diachi' => $faker->address,
                'lvs_Dienthoai' => $faker->phoneNumber,
            ]);
        }

        // Seed lvs_vattu (Vật tư) - Đảm bảo MaVT duy nhất
        foreach (range(1, 10) as $index) {
            do {
                $maVT = $faker->unique()->bothify('####');
            } while (DB::table('lvs_vattu')->where('lvs_Mavtu', $maVT)->exists());

            DB::table('lvs_vattu')->insert([
                'lvs_Mavtu' => $maVT,
                'lvs_TenVtu' => $faker->word,
                'lvs_Dvtinh' => $faker->randomElement(['Cái', 'Kg', 'Mét']),
                'lvs_Phantram' => $faker->randomFloat(2, 0, 100),
            ]);
        }

        // Seed lvs_donDH (Đơn đặt hàng) - Đảm bảo SoDH duy nhất và MaNCC khóa ngoại hợp lệ
        foreach (range(1, 5) as $index) {
            do {
                $soDH = $faker->unique()->bothify('####');
            } while (DB::table('lvs_donDH')->where('lvs_SoDH', $soDH)->exists());

            // Lấy MaNCC hợp lệ từ bảng lvs_nhacc
            $maNCC = DB::table('lvs_nhacc')->inRandomOrder()->first()->lvs_MaNCC;

            DB::table('lvs_donDH')->insert([
                'lvs_SoDH' => $soDH,
                'lvs_NgayDH' => $faker->dateTimeThisYear(),
                'lvs_MaNCC' => $maNCC,
            ]);
        }

        // Seed lvs_ctdonDH (Chi tiết đơn đặt hàng) - Đảm bảo SoDH và MaVT khóa ngoại hợp lệ
        foreach (range(1, 20) as $index) {
            $soDH = DB::table('lvs_donDH')->inRandomOrder()->first()->lvs_SoDH;
            $maVT = DB::table('lvs_vattu')->inRandomOrder()->first()->lvs_Mavtu;

            DB::table('lvs_ctdonDH')->insert([
                'lvs_SoDH' => $soDH,
                'lvs_Mavtu' => $maVT,
                'lvs_SLDat' => $faker->numberBetween(5, 50),
            ]);
        }

        // Seed lvs_pnhap (Phiếu nhập) - Đảm bảo SoPn duy nhất và SoDH khóa ngoại hợp lệ
        foreach (range(1, 5) as $index) {
            do {
                $soPn = $faker->unique()->bothify('####');
            } while (DB::table('lvs_pnhap')->where('lvs_SoPn', $soPn)->exists());

            // Đảm bảo SoDH tồn tại trước khi chèn vào lvs_pnhap
            $soDH = DB::table('lvs_donDH')->inRandomOrder()->first()->lvs_SoDH;

            DB::table('lvs_pnhap')->insert([
                'lvs_SoPn' => $soPn,
                'lvs_NgayNhap' => $faker->dateTimeThisYear(),
                'lvs_SoDH' => $soDH,
            ]);
        }

        // Seed lvs_ctpnhap (Chi tiết phiếu nhập) - Đảm bảo SoPn và MaVT khóa ngoại hợp lệ
        foreach (range(1, 20) as $index) {
            $soPnRecord = DB::table('lvs_pnhap')->inRandomOrder()->first();

            // Kiểm tra nếu bản ghi không phải là null
            if ($soPnRecord) {
                $soPn = $soPnRecord->lvs_SoPn; // Nếu tìm thấy, gán giá trị SoPn
                $maVT = DB::table('lvs_vattu')->inRandomOrder()->first()->lvs_Mavtu; // Lấy MaVT ngẫu nhiên

                // Kiểm tra xem sự kết hợp của SoPn và MaVT đã tồn tại trong bảng lvs_ctpnhap chưa
                $existingRecord = DB::table('lvs_ctpnhap')
                                    ->where('lvs_SoPn', $soPn)
                                    ->where('lvs_Mavtu', $maVT)
                                    ->first();

                // Nếu sự kết hợp chưa tồn tại, thực hiện chèn dữ liệu mới
                if (!$existingRecord) {
                    DB::table('lvs_ctpnhap')->insert([
                        'lvs_SoPn' => $soPn,
                        'lvs_Mavtu' => $maVT,
                        'lvs_SLNhap' => $faker->numberBetween(10, 100),
                        'lvs_DGNhap' => $faker->randomFloat(2, 100, 1000),
                    ]);
                } else {
                    // Nếu sự kết hợp đã tồn tại, bỏ qua việc chèn
                    continue;
                }
            } else {
                // Nếu không tìm thấy bản ghi SoPn, bỏ qua vòng lặp hiện tại
                continue;
            }
        }

        // Seed lvs_pxuat (Phiếu xuất) - Đảm bảo SoPx duy nhất
        foreach (range(1, 5) as $index) {
            do {
                $soPx = $faker->unique()->bothify('####');
            } while (DB::table('lvs_pxuat')->where('lvs_SoPx', $soPx)->exists());

            DB::table('lvs_pxuat')->insert([
                'lvs_SoPx' => $soPx,
                'lvs_NgayXuat' => $faker->dateTimeThisYear(),
                'lvs_TenKH' => $faker->name,
            ]);
        }

        // Seed lvs_ctpxuat (Chi tiết phiếu xuất) - Đảm bảo SoPx và MaVT khóa ngoại hợp lệ
        foreach (range(1, 20) as $index) {
            $soPx = DB::table('lvs_pxuat')->inRandomOrder()->first()->lvs_SoPx; // Lấy SoPx ngẫu nhiên
            $maVT = DB::table('lvs_vattu')->inRandomOrder()->first()->lvs_Mavtu; // Lấy MaVT ngẫu nhiên

            DB::table('lvs_ctpxuat')->insert([
                'lvs_SoPx' => $soPx,
                'lvs_Mavtu' => $maVT,
                'lvs_SLXuat' => $faker->numberBetween(5, 50),
                'lvs_DGXuat' => $faker->randomFloat(2, 50, 500),
            ]);
        }

        // Seed lvs_tonkho (Tồn kho) - Đảm bảo MaVT khóa ngoại hợp lệ
        foreach (range(1, 10) as $index) {
            $maVT = DB::table('lvs_vattu')->inRandomOrder()->first()->lvs_Mavtu; // Lấy MaVT ngẫu nhiên

            DB::table('lvs_tonkho')->insert([
                'lvs_NamThang' => $faker->year . $faker->month,
                'lvs_Mavtu' => $maVT,
                'lvs_SLDau' => $faker->numberBetween(0, 100),
                'lvs_TongSLN' => $faker->numberBetween(100, 200),
                'lvs_TongSLX' => $faker->numberBetween(50, 100),
                'lvs_SLCuoi' => $faker->numberBetween(0, 50),
            ]);
        }
    }
}
