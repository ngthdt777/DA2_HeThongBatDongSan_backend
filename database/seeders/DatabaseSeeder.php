<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('user_roles')->insert([
            [
                'name' => 'admin',
            ],
            [
                'name' => 'manager',
            ],
            [
                'name' => 'customer',
            ],
        ]);

        DB::table('users')->insert([
            [
                'userRoleId' => 1,
                'name' => 'admin name',
                'email' => 'admin@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345678',
            ],
            [
                'userRoleId' => 2,
                'name' => 'manager name',
                'email' => 'manager@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345688',
            ],
            [
                'userRoleId' => 3,
                'name' => 'customer name',
                'email' => 'customer@bds.com.vn',
                'DoB' => now(),
                'password' => '123',
                'phone' => '012345699',
            ],
        ]);

        DB::table('projects')->insert([
            [
                'name' => 'project 1',
                'investor' => 'investor 1',
                'introduce' => 'introduce 1',
                'info' => 'info 1',
                'customerBenefit' => 'benefit 1',
                'procedure' => 'procedure 1',
            ],
            [
                'name' => 'project 2',
                'investor' => 'investor 2',
                'introduce' => 'introduce 2',
                'info' => 'info 1',
                'customerBenefit' => 'benefit 1',
                'procedure' => 'procedure 1',
            ],
            [
                'name' => 'project 3',
                'investor' => 'investor 3',
                'introduce' => 'introduce 3',
                'info' => 'info 3',
                'customerBenefit' => 'benefit 3',
                'procedure' => 'procedure 3',
            ],
        ]);

        DB::table('project_media')->insert([
            [
                'projectId' => 1,
                'type' => 1,
                'path' => 'link 1',
            ],
            [
                'projectId' => 2,
                'type' => 1,
                'path' => 'link 2',
            ],
            [
                'projectId' => 3,
                'type' => 1,
                'path' => 'link 3',
            ],
        ]);

        DB::table('project_media')->insert([
            [
                'projectId' => 1,
                'type' => 1,
                'path' => 'link 1',
            ],
            [
                'projectId' => 2,
                'type' => 1,
                'path' => 'link 2',
            ],
            [
                'projectId' => 3,
                'type' => 1,
                'path' => 'link 3',
            ],
        ]);

        
        DB::table('areas')->insert([
            [
                'projectId' => 1,
                'name' => 'area name 1',
            ],
            [
                'projectId' => 2,
                'name' => 'area name 2',
            ],
            [
                'projectId' => 2,
                'name' => 'area name 3',
            ],
        ]);

        DB::table('real_estate_types')->insert([
            [
                'name' => 're type 1',
            ],
            [
                'name' => 're type 2',
            ],
        ]);

        DB::table('real_estates')->insert([
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'BIỆT THỰ PHÂN KHU G,F AN QUÝ VILLAS',
                'orientation' => 'TÂY',
                'acreage' => 225,
                'price' => 1000000000,
                'address' => 'Dự án An Vượng Villa, đường Tố Hữu, Phường Dương Nội, Hà Nội',
                'floor' => 5,
                'numberOfRoom' => 2,
                'description' => 'Địa thế vàng vươn mình kiêu hãnh.
                1. Đường Lê Quang Đạo 40m: Rút ngắn thời gian tới Trung Tâm Mỹ Đình chỉ 5 phút di chuyển Sức bật tăng giá cực lớn khi hoàn thành & đi vào hoạt động từ năm 2022.
                2. Đường Ngô Thì Nhậm 40m: Nối Metro Hà Đông với cầu vượt Tây Mỗ 300m tới Aeon Mall Hà Đông, 10 phút đến Vinhomes Smart City.
                3. Đường Lê Trọng Tấn: Kết nối trục Đại lộ Thăng Long, Đường Vành đai 3.5 & ba tuyến metro số 5 - 6 - 7 khoảng 5p đến chuỗi đô thị vệ tinh: KĐT Geleximco, Vinhomes Thăng Long,...
                4. Đường An Phú 27m: Chạy dọc công viên hồ điều hòa 12ha, kết nối trục Tố Hữu Lê Văn Lương khoảng 5km tới trung tâm quận Thanh Xuân.
                5. Đường nội khu rộng thoáng 24m - 28m - 32m. Ưu thế "tuyệt đối" cho hoạt động đầu tư kinh doanh & dịch vụ.
                Thuận lợi về cơ sở hạ tầng & vị trí kết nối, hai phân khu F, G sắp ra mắt hứa hẹn sẽ là mảnh đất sinh lời màu mỡ, đảm bảo dư địa tăng giá bền vững cho nhà đầu tư.',
                'dateCreated' => '2021-11-1',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'DÃY SHOPHOUSE CHÂN THÁP TÀI CHÍNH',
                'orientation' => 'ĐÔNG NAM',
                'acreage' => 480,
                'price' => 1900000000,
                'address' => 'Dự án The Manor Central Park, Đường Nguyễn Xiển, Phường Đại Kim, Hoàng Mai, Hà Nội',
                'floor' => 4,
                'numberOfRoom' => 8,
                'description' => '1. Tổng quan dự án.
                - Tên dự án: The Manor Central Park.
                - Chủ đầu tư: Tập đoàn Bitexco.
                - Vị trí:
                + Nằm ngay mặt đường Nguyễn Xiển trung tâm Hà Nội.
                + Vị trí đi lại vô cùng thuận tiện với các tuyến đường: Xa La Nguyễn Xiển, Đại Lộ Hoàng Mai, đường Nguyễn xiển...
                + Nằm cạnh công viên Chu Văn An rộng 100ha với 3 hồ điều hòa là khu vui chơi điểm đến mới của Hà Nội với đầy đủ tiện ích.',
                'dateCreated' => '2021-11-3',
                'dateModified' => now(),
            ],

            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'CHUNG CƯ LINK345 KĐT CIPUTRA',
                'orientation' => 'ĐÔNG NAM',
                'acreage' => 85,
                'price' => 3200000000,
                'address' => 'Dự án The Link 345-CT1, Đường Phạm Văn Đồng, Phường Đông Ngạc, Bắc Từ Liêm, Hà Nội',
                'floor' => 2,
                'numberOfRoom' => 3,
                'description' => 'Bán căn hộ chung cư cao cấp tại The Link 345 - Khu đô thị quốc tế Ciputra Hà Nội.
                Quỹ căn cuối cùng từ chủ đầu tư Ciputra, ký hợp đồng trực tiếp, cam kết không bán chênh, chỉ từ 3,2 tỷ sở hữu căn hộ 2PN, 2WC thông thủy 85m2/căn thường hoặc 70m2/căn góc.
                4,4 tỷ sở hữu căn hộ 3PN 115m2.',
                'dateCreated' => '2021-11-5',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'name',
                'orientation' => 'ori 1',
                'acreage' => 100,
                'price' => 100,
                'address' => 'address 1',
                'floor' => 5,
                'numberOfRoom' => 2,
                'description' => 'descripion 1',
                'dateCreated' => '2021-11-7',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'CĂN HỘ MASTERI THẢO ĐIỀN',
                'orientation' => 'BẮC',
                'acreage' => 95,
                'price' => 450000000,
                'address' => 'Dự án Masteri Thảo Điền, Quận 2, Hồ Chí Minh',
                'floor' => 2,
                'numberOfRoom' => 4,
                'description' => '- Ở đâu giá rẻ, em bao giá rẻ hơn.
                - Đã có sổ hồng, giấy tờ pháp lý đầy đủ.
                - Hỗ trợ tư vấn nhiệt tình + tận tâm + lấy uy tín làm đầu + không mua cũng không sao.',
                'dateCreated' => '2021-11-8',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'KHU CAO CẤP BEVERLY VINHOMES GRAND PARK',
                'orientation' => 'NAM',
                'acreage' => 55,
                'price' => 60000000,
                'address' => 'Dự án Vinhomes Grand Park, Quận 9, Hồ Chí Minh',
                'floor' => 10,
                'numberOfRoom' => 2,
                'description' => 'Bên em đang nhận booking đặt chỗ ưu tiên mua Phân Khu Beverly - Phân khu căn hộ cao cấp trực diện công viên 36ha tại đô thị Vinhomes Grand Park.
                Thời hạn đóng booking đợt 1: Ngày 18/11
                Mở bán: 21/11
                Tổng quan dự án The Beverly:
                + Vị trí: Cửa ngõ Vinhomes Grand Park, sát cạnh TTTM Vincom Mega Mall
                + Tổng diện tích đất: gần 55.000m2
                + Số block: 10 block
                + Số lượng căn hộ: 5.088 căn
                + Loại hình căn hộ: Shop, Studio, 1PN+1, 2PN và 3PN
                + Quy mô: Tiểu khu The Resort rộng hơn 30.000m2 và tiểu khu The Star rộng hơn 23.000m2',
                'dateCreated' => '2021-11-15',
                'dateModified' => now(),
            ],
            [
            'areaId' => 1,
            'typeId' => 1,
            'userId' => 2,
            'sold' => false,
            'name' => 'BIỆT THỰ SIÊU VIP TẠI BA SON QUẬN 1 GIÁ GỐC',
            'orientation' => 'BẮC',
            'acreage' => 145,
            'price' => 500000000,
            'address' => 'Dự án Vinhomes Golden River Ba Son, Phố Tôn Đức Thắng, Phường Bến Nghé, Quận 1, Hồ Chí Minh',
            'floor' => 5,
            'numberOfRoom' => 4,
            'description' => 'Phân phối độc quyền 08 căn biệt thự The Victoria Ba Son, mua giá gốc chủ đầu tư, thanh toán chỉ 30% nhận nhà, ngân hàng hỗ trợ 70%, ân hạn gốc và hỗ trợ lãi suất 0% trong vòng 18 - 24 tháng tùy vị trí căn. Chiết khấu ngay 9% nếu thanh toán bằng vốn tự có.',
            'dateCreated' => '2021-7-24',
            'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'BIỆT THỰ BASON VINHOMES GOLDEN RIVER CĂN GÓC ÔM TRỌN SÔNG SÀI GÒN',
                'orientation' => 'ĐÔNG BẮC',
                'acreage' => 220,
                'price' => 142000000000,
                'address' => 'Dự án Vinhomes Golden River Ba Son, Phố Tôn Đức Thắng, Phường Bến Nghé, Quận 1, Hồ Chí Minh',
                'floor' => 5,
                'numberOfRoom' => 4,
                'description' => 'Chính chủ cần bán gấp căn góc ôm trọn sông khu biệt thự Vinhomes Golden River thuộc khu Ba Son, Quận 1, Tp. HCM:
                1. Biệt thự Vinhomes Golden River (Biệt thự Vinhomes Ba Son).
                - Biệt thự song lập;
                - Diện tích: 225m2. Xây dựng: 1 hầm và 4 tầng nổi.
                - Diện tích sàn: 545m2.
                - Giá bán: 142 tỷ.',
                'dateCreated' => '2021-6-30',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'CĂN HỘ CHUNG CƯ THE SONG',
                'orientation' => 'TÂY NAM',
                'acreage' => 150,
                'price' => 2000000000,
                'address' => 'The Sóng, số 28, Phố Thi Sách, Phường Thắng Tam, Vũng Tàu, Bà Rịa Vũng Tàu',
                'floor' => 1,
                'numberOfRoom' => 5,
                'description' => 'Căn hộ sở hữu lâu dài - Tổng hợp các căn 1PN - 2PN - 3PN giá tốt nhất thị trường, căn hộ có nhiều view và nhiều tầng khác nhau cho khách hàng thoải mái lựa chọn.',
                'dateCreated' => '2021-12-22',
                'dateModified' => now(),
            ],
            [
                'areaId' => 1,
                'typeId' => 1,
                'userId' => 2,
                'sold' => false,
                'name' => 'CĂN J33 KHU BARYA CITY NGAY TRUNG TÂM HÀNH CHÍNH TP BÀ RỊA VŨNG TÀU',
                'orientation' => 'TÂY NAM',
                'acreage' => 90,
                'price' => 4000000000,
                'address' => 'Đường Nguyễn Văn Cừ, Vũng Tàu, Bà Rịa Vũng Tàu',
                'floor' => 1,
                'numberOfRoom' => 4,
                'description' => 'Chính chủ cần bán gấp căn J33 khu Barya city ngay trung tâm hành chính tp Bà Rịa Vũng Tàu.
                Dt 5x18 đã hoàn thiện phần bên ngoài.
                Nhà một trệt ba lầu.
                - Vị trí dự án 4 mặt tiền đường: Phạm Hùng, Trường Chinh, Cmt8 và Nguyễn Văn Cừ.
                - Vị trí nhà gần khu thương mại cạnh trường học quốc tế.
                - Tiện ích nội khu cao cấp: 2 block căn hộ văn phòng, thương mại, hồ bơi tràn, BBQ, trường học quốc tế, dãy shophouse kinh doanh tự do.
                - Thuận tiện cho việc kinh doanh hoặc cho thuê.
                Giá 4 tỷ.',
                'dateCreated' => '2021-4-5 ',
                'dateModified' => now(),
            ],
        ]);

        DB::table('real_estate_media')->insert([
            [
                'realEstateId' => 1,
                'type' => 1,
                'path' => 'path 1',
            ],
            [
                'realEstateId' => 2,
                'type' => 1,
                'path' => 'path 2',
            ],
        ]);

        DB::table('wish_lists')->insert([
            [
                'userId' => 1,
            ],
            [
                'userId' => 2,
            ],
        ]);

        DB::table('wish_list_real_estates')->insert([
            [
                'wishListId' => 1,
                'realEstateId' => 1,
            ],
            [
                'wishListId' => 1,
                'realEstateId' => 2,
            ],
            [
                'wishListId' => 2,
                'realEstateId' => 2,
            ],
        ]);
    }
}
