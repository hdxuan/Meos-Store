/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : meos-store

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 28/09/2021 20:30:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id_user` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id_user`, `id_product`) USING BTREE,
  INDEX `fk_id_product_cart`(`id_product`) USING BTREE,
  CONSTRAINT `fk_id_product_cart` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_id_users_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (1, 1, 1);
INSERT INTO `cart` VALUES (2, 3, 3);
INSERT INTO `cart` VALUES (3, 4, 1);
INSERT INTO `cart` VALUES (4, 4, 2);
INSERT INTO `cart` VALUES (5, 5, 1);
INSERT INTO `cart` VALUES (6, 1, 2);
INSERT INTO `cart` VALUES (7, 8, 1);
INSERT INTO `cart` VALUES (8, 10, 3);

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id_order`, `id_product`) USING BTREE,
  INDEX `fk_id_product`(`id_product`) USING BTREE,
  CONSTRAINT `fk_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, 1, 1);
INSERT INTO `order_details` VALUES (1, 3, 2);
INSERT INTO `order_details` VALUES (2, 5, 3);
INSERT INTO `order_details` VALUES (3, 4, 1);
INSERT INTO `order_details` VALUES (4, 8, 3);
INSERT INTO `order_details` VALUES (5, 12, 3);
INSERT INTO `order_details` VALUES (6, 22, 4);
INSERT INTO `order_details` VALUES (7, 13, 2);
INSERT INTO `order_details` VALUES (8, 15, 3);
INSERT INTO `order_details` VALUES (9, 16, 2);
INSERT INTO `order_details` VALUES (10, 12, 3);
INSERT INTO `order_details` VALUES (11, 14, 3);
INSERT INTO `order_details` VALUES (12, 19, 3);
INSERT INTO `order_details` VALUES (12, 20, 3);
INSERT INTO `order_details` VALUES (12, 21, 1);
INSERT INTO `order_details` VALUES (13, 17, 2);
INSERT INTO `order_details` VALUES (14, 18, 2);
INSERT INTO `order_details` VALUES (15, 1, 1);
INSERT INTO `order_details` VALUES (15, 4, 3);
INSERT INTO `order_details` VALUES (16, 5, 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_date` date NULL DEFAULT NULL,
  `delivery_date` date NULL DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_status` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_statues_order`(`id_status`) USING BTREE,
  INDEX `fk_id_users_order`(`id_user`) USING BTREE,
  CONSTRAINT `fk_id_statues_order` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_id_users_order` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, '2021-05-20', '2021-05-20', 3, 'DG');
INSERT INTO `orders` VALUES (2, '2021-05-21', '2021-05-21', 3, 'DG');
INSERT INTO `orders` VALUES (3, '2021-05-21', '2021-05-22', 4, 'DG');
INSERT INTO `orders` VALUES (4, '2021-05-21', '2021-05-21', 4, 'DG');
INSERT INTO `orders` VALUES (5, '2021-05-24', '2021-05-24', 5, 'DG');
INSERT INTO `orders` VALUES (6, '2021-05-24', '2021-05-25', 2, 'DG');
INSERT INTO `orders` VALUES (7, '2021-05-24', '2021-05-25', 8, 'DG');
INSERT INTO `orders` VALUES (8, '2021-05-25', '2021-05-26', 11, 'DG');
INSERT INTO `orders` VALUES (9, '2021-05-25', '2021-05-26', 11, 'DG');
INSERT INTO `orders` VALUES (10, '2021-05-25', NULL, 8, 'DGH');
INSERT INTO `orders` VALUES (11, '2021-05-26', NULL, 3, 'DGH');
INSERT INTO `orders` VALUES (12, '2021-05-26', NULL, 9, 'DGH');
INSERT INTO `orders` VALUES (13, '2021-05-26', NULL, 5, 'DCB');
INSERT INTO `orders` VALUES (14, '2021-05-27', NULL, 3, 'DCB');
INSERT INTO `orders` VALUES (15, '2021-05-28', NULL, 9, 'CXL');
INSERT INTO `orders` VALUES (16, '2021-05-28', NULL, 7, 'CXL');

-- ----------------------------
-- Table structure for pet_products_type
-- ----------------------------
DROP TABLE IF EXISTS `pet_products_type`;
CREATE TABLE `pet_products_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pets_type` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_pets_type`(`id_pets_type`) USING BTREE,
  CONSTRAINT `fk_id_pets_type` FOREIGN KEY (`id_pets_type`) REFERENCES `pets_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pet_products_type
-- ----------------------------
INSERT INTO `pet_products_type` VALUES (1, 'Sản phẩm cho chó', 1);
INSERT INTO `pet_products_type` VALUES (2, 'Sản phẩm cho mèo', 2);

-- ----------------------------
-- Table structure for pets_type
-- ----------------------------
DROP TABLE IF EXISTS `pets_type`;
CREATE TABLE `pets_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pets_type
-- ----------------------------
INSERT INTO `pets_type` VALUES (1, 'Chó');
INSERT INTO `pets_type` VALUES (2, 'Mèo');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10, 0) NOT NULL,
  `ingredients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `benerfits` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_products_type` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_products_type`(`id_products_type`) USING BTREE,
  CONSTRAINT `fk_id_products_type` FOREIGN KEY (`id_products_type`) REFERENCES `products_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 600 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Thức ăn Iskhan Performance 1.2kg (cho chó trưởng thành)', 252000, 'Thịt gà, Bột thịt gà, Khoai mì, Khoai tây khô, Bột chuối, Bột gà thủy phân (hương vị tự nhiên), Hỗn hợp trái cây và rau quả , gà dầu, dầu cá hồi, cellulose tinh chế, bột trứng, men bia, hạt lanh, natri clorua, lecithin, DL-methionine, vitamin E, vitamin C', 'Bổ sung thêm glucosamine và chondroitin để hỗ trợ trong việc duy trì các khớp xương và sụn. Carbohydrate đã qua sử dụng từ sắn với lượng calo thấp và chứa L-carnitine để ngăn chặn béo phì và duy trì hình dạng cơ thể trượt. Probamel và fructooligosacaride ', '1.jpg', 1);
INSERT INTO `products` VALUES (2, 'Royal canin Medium Puppy (10kg)', 131000, 'Bột mì, lúa mạch, bột gluten bắp, chất béo gà, ngô, gluten lúa mì, bột củ cải đường khô, lúa mì, hương vị tự nhiên, bột mì gạo, dầu cá, canxi cacbonat, men distillers khô men, natri silic aluminat, Dầu thực vật, kali phốt phát, muối, fructooligosaccharide', '  Sự kết hợp độc đáo của các chất dinh dưỡng để hỗ trợ tiêu hóa với các protein tiêu hóa cao (LIP) và sự cân bằng đường ruột hỗ trợ hệ bài tiết\n\nGiúp hỗ trợ  phát triển xương bền vững ở các giống chó Medium nhờ vào công thức giúp hấp thu hiệu quả Canxi và', '2.jpg', 1);
INSERT INTO `products` VALUES (3, 'Thức ăn dành cho chó trưởng thành Araton thịt cừu 3 kg', 410000, ' Thịt cừu, ngô, gạo, thịt gia cầm khử nước, lúa mì, tiểu hắc mạch, mỡ gia cầm, gluten ngô, bột củ cải đường, men bia, các khoáng chất.', 'Hệ miễn dịch khỏe mạnh: Hàm lượng vitamin E tối ưu, một chất chống oxy hóa tự nhiên, giúp tăng cường hệ thống miễn dịch và khả năng kháng bệnh của thú cưng. Thích hợp cho hệ tiêu hóa nhạy cảm: Dinh dưỡng hoàn hảo được bổ sung thịt cừu, là nguồn cung cấp p', '3.jpg', 1);
INSERT INTO `products` VALUES (4, 'Thức ăn hạt hữu cơ cho chó vị vịt ANF 6 Free 400g', 95000, 'Sản phẩm ANF - Thức ăn hạt cho chó vị vịt được cấu tạo bởi những nguyên liệu tự nhiên, có đầy đủ các thành phần dưỡng chất cho cơ thể của mọi chú chó. Chúng tôi cam kết không sử dụng những chất gây hại hay hóa học nhưng chỉ sử dụng nguyên liệu đã qua khâu', 'Chất đạm cao cấp, bổ sung thành phần thịt tươi. Chất béo không bão hòa, an toàn cho cơ thể. Chất sắt giúp bổ sung máu cho cơ thể. Với 95% nguyên liệu hữu cơ thiên nhiên, sản phẩm thức ăn cho chó của chúng tôi tự tin giúp cho thú cưng của bạn khỏe mạnh và ', '4.jpg', 1);
INSERT INTO `products` VALUES (5, 'Thức ăn Pedigree Adult vị bò & rau củ 3kg', 209000, ' Bò, Các loại rau củ quả, Chất béo, Các khoáng chất và vitamin cần thiết', 'Sản phẩm cung cấp dinh dưỡng hoàn hảo, giúp cún cưng của bạn có thể phát triển một cách toàn diện. Sản phẩm có chứa độ béo và khoáng chất tối đa giúp nuôi dưỡng những bộ lông mềm mượt, bên cạnh đó các thành phần rất dễ tiêu hóa cho nên chất dinh dưỡng sẽ ', '5.jpg', 1);
INSERT INTO `products` VALUES (6, 'Thức ăn hạt mềm Home dog cho chó túi 1.2kg', 234000, 'Thịt gà sống, bột gà, gạo lức, bột gà thủy phân (hương tự nhiên), dầu gà, dầu cá (cá hồi), bột trứng, bột chuối, quinoa hữu cơ, rau dền hữu cơ, kiều mạch hữu cơ, răng hữu cơ, lúa miến hữu cơ, Yến mạch hữu cơ, bột củ cải đường, chế phẩm vitamin (vitamin A,', 'Độ ẩm cao, giúp hạt thực ăn mềm, dễ dàng nhai và tiêu hoá, đặc biệt phù hợp với những thú cưng có hàm răng yếu. Với công nghệ Moisture Semi và nguyên liệu thịt gà tươi giúp bảo toàn tối đa các chất dinh dưỡng trong quá trình sơ chế, nhờ vậy mà giữ được độ', '6.jpg', 1);
INSERT INTO `products` VALUES (7, 'Thức ăn mềm vịt hầm sổ sung rau củ Tellme cho chó 130g', 20000, 'Thịt vịt nguyên con chất lượng cao được sử dụng cho con người là nguồn protein chính, bí ngô tươi và bông cải xanh cung cấp chất xơ, vitamin và khoáng chất. Vịt còn cung cấp, bổ sung các chất dinh dưỡng thiết yếu tốt cho sức khỏe của chó như axit béo omeg', 'Nguồn cung cấp protein chính: thịt vịt chất lượng cao (70%). Tăng cường hệ miễn dịch. Hương vị hấp dẫn, thích hợp cho chó con, chó kén ăn. Chứa vitamin và khoáng chất cần thiết cho cơ thể chó. Giàu axit béo Omega-3 và Omega-6 giúp da và bộ lông khỏe mạnh,', '7.jpg', 1);
INSERT INTO `products` VALUES (8, 'Sốt Pedigree vị gà cho chó lớn', 18000, 'Thịt (các loại), trứng sấy khô, dầu thực vật, dầu cá, DHA, rau củ, nước, vitamin như vitamin C, E, A, D và B1, các loại khoáng chất như canxi, kẽm, đồng sulfate, kali.', 'Bao gồm độ béo và khoáng chất tối đa giúp nuôi dưỡng da lông chó, và giúp chó tiêu hóa tốt hơn vì bao gồm những chất dinh dưỡng dễ dàng hấp thụ. ', '8.jpg', 1);
INSERT INTO `products` VALUES (9, 'Sữa tắm cho chó Trixie 250ml', 14000, 'Có tác dụng mạnh mẽ và hiệu quả trong việc kháng khuẩn. Thành phần vitamin có trong sữa tắm phù hợp cho tất cả các giống chó lông dài và dày như chó Alaskan, Husky, Ngao tạng, Samoyed, Chow Chow… thậm chỉ cho cả Golden, Collie và nhiều giống chó khác', 'Cung cấp dưỡng chất quan trọng cho da và lông. Tác dụng mạnh mẽ và hiệu quả kháng khuẩn. Làm sáng lông, ngăn rụng lông, giúp lông mau dài. Phù hợp với cả chó / mèo nhỏ hoặc da nhạy cảm', '9.jpg', 2);
INSERT INTO `products` VALUES (10, 'YÚ Camellia Nourish Formula 400ml', 398000, 'Sữa tắm thảo mộc chiết xuất Hoa Trà Nhật Bản', 'Nuôi dưỡng lông từ sâu bên trong, cho bộ lông luôn sáng bóng và mềm mượt', '10.jpg', 2);
INSERT INTO `products` VALUES (11, 'Dây dắt cho chó 1.2x100 (cm)', 178000, NULL, NULL, '11.png', 3);
INSERT INTO `products` VALUES (12, 'CTCBio - Vòng cổ ngắn', 68000, 'Size :  1.5 / 44-49cm', NULL, '13.png', 3);
INSERT INTO `products` VALUES (13, 'Dây dắt tự động size XS Flexi New Comfort', 382000, 'Dây dắt dài: 3m. Dùng với chó, mèo và các động vật nhỏ khác nặng dưới 8kg. Hệ thống phanh ngắn. Trọng lượng sản phẩm: 120g.', 'Dây dắt chó Flexi New Comfort được thiết kế hoàn hảo với 2 màu bắt mắt. New Comfort giúp dể dàng kiểm soát thông qua hệ thống phanh tốt hơn. Các phụ kiện đi kèm như đèn LED chiếu sáng và Multi Box chứa bánh thưởng hoặc túi xử lý chất thải, hỗ trợ cuộc dạo', '12.png', 3);
INSERT INTO `products` VALUES (14, 'Rọ mõm mỏ vịt silicon size L', 124000, 'Size L: chu vi miệng 16cm, chu vi đầu 30 ~ 40cm', 'Khi dắt một chú chó đi dạo, bạn sợ chúng sẽ ăn linh tinh khi bạn không để mắt đến hoặc khi gặp vật lạ chúng sẽ sủa làm mọi người xung quanh sợ hãi, thì bạn hãy sắm ngay cho chúng một chiếc rọ mõm nhé. Một chiếc rọ mõm sẽ ngăn chặn việc: chúng ăn lung tung', '14.jpg', 3);
INSERT INTO `products` VALUES (15, 'Rọ mõm inox size (to) 4', 170000, 'Size S: cho chó lớn từ 15kg - 30kg - độ sâu mõm 10cm, chu vi 31cm\nSize M: cho chó lớn từ 30kg - 40kg - độ sâu mõm 12cm, chu vi 37cm\nSize L: cho chó lớn từ 40kg - 60kg - độ sâu mõm14cm, chu vi 45cm', 'Thiết kế tay lắp mở dễ dàng. Đủ loại kích cỡ, phù hợp cho nhiều giống chó. Độ to nhỏ hài hòa với dây đai. Dây đai kháng khuẩn, siêu bền không lo bị cắn hỏng', '15.jpg', 3);
INSERT INTO `products` VALUES (16, 'Gel vệ sinh răng chó mèo beaphar', 181000, 'Nước, Glycerin, Pentasodium Triphosphate, Carboxypolymethylene, Ovum powder, Melthyparapen, Propylparapen, Liver powder, Propylena Glycol, Sodium Chloride, Subtilisin, Glucose Oxidase, Sodium Citrate, Sodium Phosphte, Calcium Chloride.', 'Thoa một lớp gel mỏng lên toàn bộ bề mặt trong và ngoài răng của thú cưng\nKhông để sản phẩm tiếp xúc với mắt\nKhông có giới hạn thời gian sử dụng', '16.jpg', 4);
INSERT INTO `products` VALUES (17, 'Dung dịch vệ sinh mắt cho dog/ cat beaphar', 193000, 'Dung dịch nước muối beaphar ', 'Làm sạch bên trong và xung quanh vùng mắt cho chó/mèo, sử dụng thường xuyên để giữ cho mắt thú cưng luôn sạch, ngăn ngừa các bệnh về mắt.', '17.jpg', 4);
INSERT INTO `products` VALUES (18, 'Virbac Nutri-Plus Gel - Gel ăn dinh dưỡng', 200000, 'Nutriplus Gel sử dụng các chất dinh dưỡng có nguồn gốc động vật giúp chuyển đổi thành năng lượng một cách dễ dàng và nhanh chóng. Liều lượng: 1-2 muỗng canh / 5kg thể trọng (10cm) mỗi ngày', 'Cung cấp nguồn năng lượng cao cấp, dễ hấp thu. Duy trì vẻ đẹp của da, lông, tăng cường sức khoẻ. Khôi phục cảm giác ngon miệng.', '18.jpg', 4);
INSERT INTO `products` VALUES (19, 'Canxi Phốt Pho-hỗ trợ điều trị cho thú cưng', 276000, 'Với công thức cân bằng kết hợp canxi hàm lượng cao với Phốt Pho và Vitamin D trong cùng 1 viên thuốc giúp động vật có thể hấp thụ canxi tối ưu để phát triển khung xương chắc khoẻ', ' Canxi Phốt Pho của hãng PetAg ( Mỹ ) là canxi hàng đầu trong việc điều trị bệnh liên quan đến hệ thống khung xương của chó mèo như sập bàn, hạ bàn, thiếu canxi, còi xương ', '19.jpg', 4);
INSERT INTO `products` VALUES (20, 'Vitamin tổng hợp cho chó Beaphar', 236000, 'Vitamin B1, Niacin, Vitamin B6, Vitamin B12, Vitamin B2, Vitamin E, Biotin, Folic acid, L-Carnitine', 'Cung cấp các vitamin cần thiết, khoáng chất và các nguyên tố vi lượng, giúp tăng cường sinh lực và tăng cường tình trạng thể chất, khuyến khích sự phát triển tự nhiên của xương và răng', '20.jpg', 4);
INSERT INTO `products` VALUES (21, 'Mon Ami Toy Soft - Đồ chơi lông thú hình cừu', 79000, 'Kích thước: 13 x 13 x 13 cm', 'Sản phẩm đồ chơi lông thú hình cừu được sản xuất từ bông và lông nhân tạo an toàn cho thú cưng , với thiết kế bắt mắt và kích thích thú cưng chơi đùa cả ngày mà không chán.', '21.jpg', 5);
INSERT INTO `products` VALUES (22, 'Đồ chơi bowling hà mã/heo/lừa', 68000, NULL, NULL, '22.png', 5);
INSERT INTO `products` VALUES (23, 'Đồ chơi rubber hình cầu mây', 125000, 'Sản phẩm được làm từ 100% cao su thiên nhiên, có độ mềm, dẻo, dai vừa phải và đặc biệt an toàn.\nĐạt tiêu chuẩn Châu Âu, có giấy chứng nhận REACH, ROSH.\nKhông độc hai, an toàn cho thú cưng khi cắn và ngậm.\nĐộ đàn hồi cao, bền.\nĐường kính: 130mm, Trọng lượn', 'Giảm sự ngứa răng của vật nuôi, phòng tránh việc cắn phá đồ bừa bãi.\nCó tác dụng làm sạch răng cho thú cưng, giảm sự ngứa răng trong thời điểm thay răng.', '23.jpg', 5);
INSERT INTO `products` VALUES (24, 'Đồ chơi rubber hình trái banh có dây 2,5', 75000, 'Sản phẩm được làm từ 100% cao su thiên nhiên, có độ mềm, dẻo, dai vừa phải và đặc biệt an toàn.\nĐạt tiêu chuẩn Châu Âu, có giấy chứng nhận REACH, ROSH.\nKhông độc hai, an toàn cho thú cưng khi cắn và ngậm.\nĐộ đàn hồi cao, bền.\nĐường kính: 2.5\".\nMàu sắc đẹp', 'Giảm sự ngứa răng của vật nuôi, phòng tránh việc cắn phá đồ bừa bãi.\nCó tác dụng làm sạch răng cho thú cưng, giảm sự ngứa răng trong thời điểm thay răng.', '24.jpg', 5);
INSERT INTO `products` VALUES (25, 'Đồ chơi rubber trái banh hoa văn', 50000, 'Sản phẩm được làm từ 100% cao su thiên nhiên.\nĐạt tiêu chuẩn Châu Âu, có giấy chứng nhận REACH, ROSH.\nKhông độc hai, an toàn cho thú cưng khi cắn và ngậm.\nĐộ đàn hồi cao, bền.\nĐường kính: 2.5\".\nMàu sắc đẹp,  thu hút sự chú ý của thú cưng nhà bạn.', 'Giảm sự ngứa răng của vật nuôi, phòng tránh việc cắn phá đồ bừa bãi.\nCó tác dụng làm sạch răng cho thú cưng, giảm sự ngứa răng trong thời điểm thay răng.', '25.jpg', 5);
INSERT INTO `products` VALUES (26, 'Kong Núm vú Puppy ', 211000, 'Chất liệu các sản phẩm có nguồn gốc từ cao su tự nhiên', 'Giảm sự ngứa răng của vật nuôi, phòng tránh việc cắn phá đồ bừa bãi.\nCó tác dụng làm sạch răng cho thú cưng, giảm sự ngứa răng trong thời điểm thay răng.', '26.jpg', 5);
INSERT INTO `products` VALUES (27, 'Nệm oval ABC màu xanh', 156000, 'Size 4: kích thước 54 x 16 x 41 cm. Chất liệu cotton thông thoáng, dễ vệ sinh, rất phù hợp với khí hậu nóng ẩm ở Việt Nam. Bề mặt nằm có 2 lớp nệm tạo sự êm ái, thú cưng nhà bạn sẽ luôn có cảm giác được nâng niu và yêu chiều.', 'Thiết kế nệm hình oval sinh động với gam màu nổi bật và hình dấu chân ngộ nghĩnh của chú chó trải đều khắp, họa tiết mang đến sự quen thuộc và gần gũi cho chú cún đáng yêu trong nhà.', '27.jpg', 6);
INSERT INTO `products` VALUES (28, 'Lồng sơn tĩnh điện xuất khẩu', 299000, 'Bột sơn không có dung môi => vô cùng an toàn, không sợ cháy. Không dẫn điện. Không sợ kim loại bị ăn mòn, ion hóa khi sử dụng nhiều ở ngoài trời, độ bền của sản phẩm cao hơn sơn thường rất nhiều. Khả năng chịu nhiệt cao, không bị ảnh hưởng của môi trường ', 'Linh động, dễ dàng gấp gọn: Lồng chó mèo được thiết kế có thể gấp gọn được, bởi vậy khi không cần sử dụng đến. Thiết kế thông thoáng, không gian rộng: Lồng sắt sơn tĩnh điện này sẽ tạo cho pet yêu của bạn cảm giác thoải mái, không cảm thấy bức bí.', '28.jpg', 6);
INSERT INTO `products` VALUES (29, 'Nhà hình quả dưa hấu lớn xanh', 353000, 'Ngôi nhà được làm từ chất liệu cotton thông thoáng, dễ vệ sinh và phù hợp với khí hậu nóng ẩm ở Việt Nam. Bề mặt nằm có lớp lót cotton êm cùng thiết kế hình quả dưa hấu với 3 mặt bao quanh nhằm tạo cho thú cưng của bạn cảm giác được che chở an toàn và ấm ', 'Nhà cho thú cưng sử dụng gam màu nổi bật kết hợp với những đường vân mô phỏng quả dưa hấu, đây chắc chắn sẽ là nơi thư giãn lý tưởng, làm hài lòng những chú cún con xinh xắn', '29.jpg', 6);
INSERT INTO `products` VALUES (30, 'Nhà ếch xanh', 399000, 'Ngôi nhà được làm từ chất liệu cotton thông thoáng, dễ vệ sinh và phù hợp với khí hậu nóng ẩm ở Việt Nam. Bề mặt nằm có lớp lót cotton êm cùng thiết kế hình ngôi nhà với 3 mặt bao quanh nhằm tạo cho thú cưng của bạn cảm giác được che chở an toàn và ấm áp', 'Nhà cho thú cưng sử dụng gam màu nổi bật kết hợp với những đường kẻ sọc cá tính, đây chắc chắn sẽ là nơi thư giãn lý tưởng, làm hài lòng những chú cún con xinh xắn.', '30.jpg', 6);
INSERT INTO `products` VALUES (31, 'Nhà nhựa lớn cao cấp', 400000, 'Tháo rời, lắp ráp được. Hàng đặt làm , chất liệu bền, chắc chắn', 'Nhà nhựa cao cấp cho chó mèo, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn', '31.jpg', 6);
INSERT INTO `products` VALUES (32, 'Túi đeo chó mèo', 696000, 'Từng đường may được chăm chút cẩn thận, giúp kèo dài tuổi thọ sản phẩm. Chất liệu vải thoáng mát, mang lại cảm giác thoải mái cho các bé', 'Màu sắc bắt mắt. Kiểu dáng vô cùng dễ thương. Dễ dàng vệ sinh, dọn dẹp', '32.jpg', 7);
INSERT INTO `products` VALUES (33, 'Balo cho thú cưng', 670000, 'Từng đường may được chăm chút cẩn thận, giúp kèo dài tuổi thọ sản phẩm. Chất liệu vải thoáng mát, mang lại cảm giác thoải mái cho các bé', 'Màu sắc bắt mắt. Kiểu dáng vô cùng dễ thương. Dễ dàng vệ sinh, dọn dẹp', '33.jpg', 7);
INSERT INTO `products` VALUES (34, 'Túi xách vận chuyển thú cưng bằng vải lớn', 240000, 'Kích thước: Dài 47cm, rộng 20cm, cao 27cm, thích hợp với chó mèo dưới 8kg,có luới thông gió,quai xách, quai đeo,có thể xếp gọn', 'Túi xách vận chuyển cho chó mèo, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn', '34.jpg', 7);
INSERT INTO `products` VALUES (35, 'Ferplast Duo Feed - Chén ăn đôi', 302000, 'Kích thước : 39 x 20 x 9cm (dài * rộng * cao) (dung tích 500ml/bát)', 'Bộ sản phẩm được thiết kế thành hai phần gồm có khay nhựa bên ngoài và chén Inox bên trong giúp việc vệ sinh sản phẩm dể dàng hơn.  Ngoài ra sản phẩm còn có những miếng cao su chống trượt an toàn giúp khay không bị dịch chuyển khi chú chó của bạn đang thư', '35.jpg', 8);
INSERT INTO `products` VALUES (36, 'Ferplast Magnus - Chén nhựa ăn chậm', 147000, 'Kích thước : 22 x 21 x 10 cm (đáy * miệng  * cao)', 'Sản phẩm giúp chó ăn chậm hơn, ngăn ngừa tình trạng béo phì, sình bụng và nôn mửa.', '36.jpg', 8);
INSERT INTO `products` VALUES (37, 'Bát ăn đôi chó mèo hình heo', 77000, 'Kích thước: 28 x 15 x 4 cm. Chất liệu nhựa cao cấp, không đổ màu, độ bền cao.', 'Có thể vệ sinh dễ dàng. Hỗ trợ huấn luyện thú cưng ăn uống đúng chỗ. Tiết kiệm diện tích. Ngoài ra bát đôi còn giúp kích thích sự thèm ăn hay uống, luôn giúp các bé chó mèo ăn uống đúng chỗ.', '37.png', 8);
INSERT INTO `products` VALUES (38, 'Bình nước tự động cho thú cưng', 210000, 'Chất liệu cao cấp, độ bền cao, không gây độc hại cho thú cưng. Phần vòi nước được làm từ inox, chống rỉ sét, đảm bảo sức khỏe cho chó. Kích Thước: 24 x 17 x 38 cm', 'Giúp tiết kiệm diện tích. Bên trong phần vòi nước có viên bi cao cấp không gây kẹt nước', '38.jpg', 8);
INSERT INTO `products` VALUES (39, 'Áo trụ thêu chanel xanh', 70000, 'Chất liệu cotton thoáng mát, mềm mại.\nTạo cảm giác thoải mái.\nTăng vẻ quý phái cho thú cưng.\nNhiều Size khác nhau.\nChất liệu Polyester chính hiệu.', 'Với thiết kế tinh tế của áo thun, Boss sẽ nổi bật và ấm áp hơn khi cùng Sen dạo phố đón những cơn gió đầu mùa.\n', '39.jpg', 9);
INSERT INTO `products` VALUES (40, 'Đầm thun sườn xám trái dâu ', 80000, 'Chất liệu cotton thông thoáng, hút ẩm tốt, tạo cảm giác thoải mái cho thú cưng. Hơn nữa, chất liệu dễ giặt và mau khô, rất phù hợp với khí hậu nóng ẩm ở Việt Nam. Đường may tỉ mỉ cùng thiết kế hướng đến sự thoải mái tối đa giúp thú cưng không có cảm giác ', 'Hãy tạo cho thú cưng của bạn sự “sành điệu” khi sánh bước bên cạnh cô chủ, cậu chủ bằng những bộ cánh độc đáo đầy ngộ nghĩnh. Luôn hướng đến sự thoải mái và tính thời trang, đầm không những là lớp áo bảo vệ cơ thể rất hiệu quả mà còn là niềm hãnh diện của', '40.jpg', 9);
INSERT INTO `products` VALUES (41, 'Đầm Soiree cho chó mèo ', 150000, 'Chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho cún yêu nhà bạn. Nhiều size để lựa chọn cho thú cưng của bạn.\n', 'Luôn hướng đến sự thoải mái và tính thời trang, Đầm Soiree không những là lớp áo quần bảo vệ cơ thể rất hiệu quả mà còn là niềm hãnh diện của chủ nhân khi sự xinh xắn của cún con thu hút mọi ánh nhìn và khiến không ít người phải trầm trồ khen ngợi.', '41.png', 9);
INSERT INTO `products` VALUES (42, 'Áo Khủng Long xanh 4 chân cho chó', 100000, 'Quần áo chó mèo - áo hình khủng long xanh siêu dễ thương, chất liệu thun cotton co giãn .\n\n- Gợi ý chọn size:\n+S (thích hợp cho 2 ~ 3 kg)\n+M (thích hợp cho 3 ~ 5 kg)\n+L (thích hợp cho 5 ~ 8 kg)\n+XL(thích hợp cho 8 ~ 10 kg)\n+2XL(thích hợp cho 10 ~ 12 kg)', 'Quần áo chó mèo - áo hình khủng long xanh siêu dễ thương, chất liệu thun cotton co giãn .', '43.jpg', 9);
INSERT INTO `products` VALUES (43, 'Tellme - Pate gan thịt heo cho chó 130gr', 20000, 'TELLME Pa tê Gan Thịt Heo bổ sung Canxi chiết xuất từ vỏ trứng và dầu Ô liu được chế biến theo công nghệ Túi hầm chịu nhiệt, khóa chọn dinh dưỡng, không có chất bảo quản giúp các bạn cún yêu bổ sung can xi tự nhiên và dầu ô liu giúp xương chắc khỏe, lông ', 'Được làm 100% Da bò tự nhiên\n‌- Làm hoàn toàn thủ công, không hóa chất và sấy khô ở nhiệt độ thích hợp giúp giữ nguyên dưỡng chất.\n-‌ Giúp răng chắc khỏe và sạch sẽ\n‌- Collagen trong da bò giúp lông cún bóng mượt, khỏe mạnh, hạn chế rụng lông, làm chậm sự', '44.jpg', 10);
INSERT INTO `products` VALUES (44, 'Pate Morando dành cho các loại chó vị thịt bê 400gr', 50000, 'Thức ăn Morando dành cho dòng chó con vị thịt bê, Thức ăn Morando  dành cho chó trưởng thành vị thịt bò, Thức ăn Morando dành cho chó trưởng thành vị thịt gà, Thức ăn Morando dành cho chó con, các dòng chó bé', '‌- Làm hoàn toàn thủ công, không hóa chất và sấy khô ở nhiệt độ thích hợp giúp giữ nguyên dưỡng chất.\n-‌ Giúp răng chắc khỏe và sạch sẽ\n‌- Collagen trong da bò giúp lông cún bóng mượt, khỏe mạnh, hạn chế rụng lông, làm chậm sự lão hóa của các tế bào cơ th', '45.png', 10);
INSERT INTO `products` VALUES (45, 'Pate Monge vịt và cam 100g', 30000, ' Đạm thô 9%, dầu và chất béo 7%, chất tro 1,2%, chất xơ 0.5%, độ ẩm 82%, chất làm đặc,  vitamin A 3000U.I./Kg, vitamin D3 400U.I./Kg, vitamin E 15mg/Kg.', 'Đây là sản phẩm giàu đạm, cung cấp canxi và các vi khuẩn có lợi từ phô mai . Giúp bổ sung các dưỡng chất cần thiết cho cơ thể , hỗ trợ quá trình tạo máu, làm chú chó luôn cảm thấy thật khỏe mạnh và thư giãn \n- Sản phẩm giàu dinh dưỡng,  giúp thúc đẩy sự p', '46.jpg', 10);

-- ----------------------------
-- Table structure for products_type
-- ----------------------------
DROP TABLE IF EXISTS `products_type`;
CREATE TABLE `products_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pet_products_type` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_pet_products_type`(`id_pet_products_type`) USING BTREE,
  CONSTRAINT `fk_id_pet_products_type` FOREIGN KEY (`id_pet_products_type`) REFERENCES `pet_products_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products_type
-- ----------------------------
INSERT INTO `products_type` VALUES (1, 'Thức ăn', 1);
INSERT INTO `products_type` VALUES (2, 'Sữa tắm ', 1);
INSERT INTO `products_type` VALUES (3, 'Phụ kiện ', 1);
INSERT INTO `products_type` VALUES (4, 'Thực phẩm chức năng', 1);
INSERT INTO `products_type` VALUES (5, 'Đồ chơi ', 1);
INSERT INTO `products_type` VALUES (6, 'Chuồng ', 1);
INSERT INTO `products_type` VALUES (7, 'Balo ', 1);
INSERT INTO `products_type` VALUES (8, 'Vật dụng ăn uống ', 1);
INSERT INTO `products_type` VALUES (9, 'Quần áo ', 1);
INSERT INTO `products_type` VALUES (10, 'Pate ', 1);
INSERT INTO `products_type` VALUES (11, 'Thức ăn', 2);
INSERT INTO `products_type` VALUES (12, 'Sữa tắm ', 2);
INSERT INTO `products_type` VALUES (13, 'Phụ kiện ', 2);
INSERT INTO `products_type` VALUES (14, 'Thực phẩm chức năng', 2);
INSERT INTO `products_type` VALUES (15, 'Đồ chơi ', 2);
INSERT INTO `products_type` VALUES (16, 'Chuồng ', 2);
INSERT INTO `products_type` VALUES (17, 'Balo ', 2);
INSERT INTO `products_type` VALUES (18, 'Vật dụng ăn uống ', 2);
INSERT INTO `products_type` VALUES (19, 'Quần áo ', 2);
INSERT INTO `products_type` VALUES (20, 'Pate ', 2);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('CXL', 'Chưa xử lý');
INSERT INTO `status` VALUES ('DCB', 'Đang chuẩn bị đơn hàng');
INSERT INTO `status` VALUES ('DG', 'Đã giao');
INSERT INTO `status` VALUES ('DGH', 'Đang giao hàng');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` int(2) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Quản trị viên', '0000000000', '0000000000', '12345', 'admin', 0, NULL);
INSERT INTO `users` VALUES (2, 'Nguyễn Tùng Lâm', '0338309523', '124 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'lam@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (3, 'Nguyễn Hoàng Thông', '0358309329', '12 đường Lý Tự Trọng, phường An Lạc, quận Ninh Kiều, TP.Cần Thơ', '12345', 'thong@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (4, 'Hầu Diễm Xuân', '0123763585', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'xuan@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (5, 'Phạm Chí Trung', '0925385162', '82 đường Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'trung@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (6, 'Đoàn Duy Thanh', '0873174284', '97 đường Hùng Vương, phường An Cư, quận Ninh Kiều, TP.Cần Thơ', '12345', 'thanh@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (7, 'Nguyễn Huỳnh Hoàng Phúc', '0836109481', '48 đường Trần Ngọc Quế, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'phuc@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (8, 'Trần Văn Thiệt', '0927385387', '178 đường Nguyễn Việt Hồng, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'thiet@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (9, 'Nguyễn Thị Thúy Lựu', '0391278359', '132 đường Mậu Thân, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '12345', 'luu@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (10, 'Trịnh Kim Chi', '0331489511', '228 đường Nguyễn Trãi, phường Cái Khế, quận Ninh Kiều, TP.Cần Thơ', '12345', 'chi@gmai.com', 1, NULL);
INSERT INTO `users` VALUES (11, 'Trần Phương Thảo', '0702137273', '312 đường Nguyễn Văn Linh, phường Hưng Lợi, quận Ninh Kiều, TP.Cần Thơ', '12345', 'thao@gmai.com', 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
