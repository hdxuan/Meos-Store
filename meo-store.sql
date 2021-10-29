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

 Date: 29/10/2021 14:25:24
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
  CONSTRAINT `fk_id_product_cart` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_users_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (1, 1, 1);
INSERT INTO `cart` VALUES (2, 1, 1);
INSERT INTO `cart` VALUES (2, 2, 2);
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
  `amount` int(10) NOT NULL DEFAULT 1,
  `price_product` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`id_order`, `id_product`) USING BTREE,
  INDEX `fk_id_product`(`id_product`) USING BTREE,
  CONSTRAINT `fk_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (1, 1, 1, 252000);
INSERT INTO `order_details` VALUES (1, 3, 2, 175000);
INSERT INTO `order_details` VALUES (2, 5, 3, 209000);
INSERT INTO `order_details` VALUES (3, 4, 1, 95000);
INSERT INTO `order_details` VALUES (4, 8, 3, 18000);
INSERT INTO `order_details` VALUES (5, 12, 3, 68000);
INSERT INTO `order_details` VALUES (6, 22, 4, 68000);
INSERT INTO `order_details` VALUES (7, 13, 2, 382000);
INSERT INTO `order_details` VALUES (8, 15, 3, 170000);
INSERT INTO `order_details` VALUES (9, 16, 2, 181000);
INSERT INTO `order_details` VALUES (10, 12, 3, 68000);
INSERT INTO `order_details` VALUES (11, 14, 3, 124000);
INSERT INTO `order_details` VALUES (12, 19, 3, 276000);
INSERT INTO `order_details` VALUES (12, 20, 3, 236000);
INSERT INTO `order_details` VALUES (12, 21, 1, 79000);
INSERT INTO `order_details` VALUES (13, 17, 2, 193000);
INSERT INTO `order_details` VALUES (14, 18, 2, 200000);
INSERT INTO `order_details` VALUES (15, 1, 1, 252000);
INSERT INTO `order_details` VALUES (15, 4, 3, 95000);
INSERT INTO `order_details` VALUES (16, 5, 1, 209000);
INSERT INTO `order_details` VALUES (21, 3, 1, 175000);
INSERT INTO `order_details` VALUES (21, 5, 1, 209000);
INSERT INTO `order_details` VALUES (22, 4, 1, 95000);
INSERT INTO `order_details` VALUES (22, 5, 1, 209000);
INSERT INTO `order_details` VALUES (22, 7, 1, 20000);
INSERT INTO `order_details` VALUES (22, 40, 1, 80000);
INSERT INTO `order_details` VALUES (28, 2, 1, 131000);
INSERT INTO `order_details` VALUES (28, 5, 1, 209000);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NULL DEFAULT NULL,
  `delivery_date` date NULL DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `id_status` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_id_statues_order`(`id_status`) USING BTREE,
  INDEX `fk_id_users_order`(`id_user`) USING BTREE,
  CONSTRAINT `fk_id_statues_order` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_id_users_order` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, '2021-05-20', '2021-05-20', 3, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (2, '2021-05-21', '2021-05-21', 3, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (3, '2021-05-21', '2021-05-22', 4, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (4, '2021-05-21', '2021-05-21', 4, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (5, '2021-05-24', '2021-05-24', 5, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (6, '2021-05-24', '2021-05-25', 2, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (7, '2021-05-24', '2021-05-25', 8, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (8, '2021-05-25', '2021-05-26', 11, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (9, '2021-05-25', '2021-05-26', 11, 'DG', NULL, NULL);
INSERT INTO `orders` VALUES (10, '2021-05-25', NULL, 8, 'DGH', NULL, NULL);
INSERT INTO `orders` VALUES (11, '2021-05-26', NULL, 3, 'DGH', NULL, NULL);
INSERT INTO `orders` VALUES (12, '2021-05-26', NULL, 9, 'DGH', NULL, NULL);
INSERT INTO `orders` VALUES (13, '2021-05-26', NULL, 5, 'DCB', NULL, NULL);
INSERT INTO `orders` VALUES (14, '2021-05-27', NULL, 3, 'DCB', NULL, NULL);
INSERT INTO `orders` VALUES (15, '2021-05-28', NULL, 9, 'CXL', NULL, NULL);
INSERT INTO `orders` VALUES (16, '2021-05-28', NULL, 7, 'CXL', NULL, NULL);
INSERT INTO `orders` VALUES (21, '2021-10-17', NULL, 15, 'CXL', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0120589414');
INSERT INTO `orders` VALUES (22, '2021-10-23', '0000-00-00', 15, 'DG', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0120589414');
INSERT INTO `orders` VALUES (28, '2021-10-23', '2021-11-04', 15, 'CXL', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '0120589414');

-- ----------------------------
-- Table structure for pet_products_type
-- ----------------------------
DROP TABLE IF EXISTS `pet_products_type`;
CREATE TABLE `pet_products_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pet_products_type
-- ----------------------------
INSERT INTO `pet_products_type` VALUES (1, 'Sản phẩm cho chó');
INSERT INTO `pet_products_type` VALUES (2, 'Sản phẩm cho mèo');

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
  INDEX `fk_id_type`(`id_products_type`) USING BTREE,
  CONSTRAINT `fk_id_type` FOREIGN KEY (`id_products_type`) REFERENCES `products_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (0, 'Thức Ăn Cho Mèo Trưởng Thành Ideal Recipe 1kg ', 265000, 'Đạm thuỷ phân cao cấp. Selenium tự nhiên. Sốt phủ hạt chiết xuất từ thịt gà. Chất xơ từ rau củ quả. Đa vitamin. Đa khoáng. Tinh dầu chiết xuất từ cây Yucca. Taurine tốt cho mắt của mèo', 'Kiểm soát độ pH trong nước tiểu, từ đó hạn chế việc hình thành các viên sỏi gây tắt nghẽn đường tiết niệu và cũng là căn bệnh vô cùng phổ biến ở mèo.  Giảm búi lông: Hạt có lượng chất xơ lớn giúp cuốn đi những phần lông dư thừa trong bụng của mèo, ngăn ng', '55.png', 11);
INSERT INTO `products` VALUES (1, 'Thức ăn Iskhan Performance 1.2kg (cho chó trưởng thành)', 252000, 'Thịt gà, Bột thịt gà, Khoai mì, Khoai tây khô, Bột chuối, Bột gà thủy phân (hương vị tự nhiên), Hỗn hợp trái cây và rau quả , gà dầu, dầu cá hồi, cellulose tinh chế, bột trứng, men bia, hạt lanh, natri clorua, lecithin, DL-methionine, vitamin E, vitamin C', 'Bổ sung thêm glucosamine và chondroitin để hỗ trợ trong việc duy trì các khớp xương và sụn. Carbohydrate đã qua sử dụng từ sắn với lượng calo thấp và chứa L-carnitine để ngăn chặn béo phì và duy trì hình dạng cơ thể trượt. Probamel và fructooligosacaride ', '1.png', 1);
INSERT INTO `products` VALUES (2, 'Royal canin Medium Puppy (10kg)', 131000, 'Bột mì, lúa mạch, bột gluten bắp, chất béo gà, ngô, gluten lúa mì, bột củ cải đường khô, lúa mì, hương vị tự nhiên, bột mì gạo, dầu cá, canxi cacbonat, men distillers khô men, natri silic aluminat, Dầu thực vật, kali phốt phát, muối, fructooligosaccharide', '  Sự kết hợp độc đáo của các chất dinh dưỡng để hỗ trợ tiêu hóa với các protein tiêu hóa cao (LIP) và sự cân bằng đường ruột hỗ trợ hệ bài tiết\n\nGiúp hỗ trợ  phát triển xương bền vững ở các giống chó Medium nhờ vào công thức giúp hấp thu hiệu quả Canxi và', '2.jpg', 1);
INSERT INTO `products` VALUES (3, 'O\'fresh Beef & Oat meal 1.3kg', 175000, ' Thịt cừu, ngô, gạo, thịt gia cầm khử nước, lúa mì, tiểu hắc mạch, mỡ gia cầm, gluten ngô, bột củ cải đường, men bia, các khoáng chất.', 'Hệ miễn dịch khỏe mạnh: Hàm lượng vitamin E tối ưu, một chất chống oxy hóa tự nhiên, giúp tăng cường hệ thống miễn dịch và khả năng kháng bệnh của thú cưng. Thích hợp cho hệ tiêu hóa nhạy cảm: Dinh dưỡng hoàn hảo được bổ sung thịt cừu, là nguồn cung cấp p', '3.jpg', 1);
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
INSERT INTO `products` VALUES (46, 'Thức Ăn Cho Mèo Kén Ăn Reflex Plus Choosy 1.5kg ', 190000, 'Protein cá hồi (khử nước tối thiểu 27%. Protein gà (khử nước).  Gạo. Mỡ gà bã củ dền. Vitamin và khoáng chất. Xylo-oligosaccharides. Chiết xuất cây yucca schidigera', 'Sản phẩm sử dụng công thức đặc biệt bao gồm: tinh chất cây Yucca, Omega-3, đạm cao cấp và các vitamin quan trọng giúp cho mèo dù có ăn ít nhưng vẫn được cung cấp lượng dinh dưỡng đầy đủ. Để thúc đẩy mèo ăn nhiều hơn, sản phẩm có mùi thơm đặc biệt, giúp kí', '53.png', 11);
INSERT INTO `products` VALUES (47, 'Thức Ăn Cho Mèo Chứa 95% Đạm Natural Core 1kg – 100% Organic', 275000, 'Thịt gà được nuôi tự nhiên, không có thuốc kháng sinh và thuốc kích thích tăng trọng (có chứng nhận). Thịt vịt giúp bổ sung Vitamin E và Beta-Carotene chống oxy hoá và làm chậm sự lão hoá của các cơ quan trong cơ thể. Ngũ cốc hữu cơ (Yến mạch, gạo lứt, lú', 'Đẹp lông và da. Giảm thiểu mùi hôi chất thải. Tăng cường khả năng tiêu hoá. Loại bỏ búi lông trong dạ dày. Tăng sức đề kháng. Ngoài đạm thì 5% còn lại là các axit amin và các axit béo có chức năng tăng sức đề kháng và cải thiện vẻ đẹp của lông da.  Đạm có', '54.png', 11);
INSERT INTO `products` VALUES (49, 'Hạt Mềm Cho Mèo Zenith 1.2kg – Trị Biếng Ăn', 232000, 'Hạt Zenith mềm nên mèo sẽ ăn mạnh hơn, phù hợp cho những chú mèo đang kén ăn hoặc ăn ít. Hạt phù hợp với mèo ở mọi giai đoạn, từ mang thai đến mèo con tới mèo trưởng thành và mèo già. Túi Zenith 1.2kg sẽ bao gồm 4 gói nhỏ 300g bên trong nên bạn sẽ yên tâm', 'Đây chính là lý do mà bạn nên mua thức ăn mềm Zenith cho mèo, vì sản phẩm giàu dinh dưỡng mà lại còn dễ ăn đối với các bé. Sản phẩm không những cung cấp đầy đủ dinh dưỡng cho mèo sinh hoạt hằng ngày mà còn bổ sung một số dưỡng chất giúp cải thiện lông và ', '56.png', 11);
INSERT INTO `products` VALUES (50, 'Thức Ăn Cho Mèo Con Reflex 2kg – Giá Rẻ – Vị Gà', 155000, 'Sản phẩm sở hữu công thức độc quyền giúp bổ sung Omega-3 và Omega-6, hai vi chất cực quan trọng cho sức khỏe của lông và móng mèo, giúp cho lông bóng mượt và ít rụng hơn.  Hạt giúp bổ sung các loại khoáng chất cũng như các vitamin cần thiết cho mèo như vi', 'Giảm mùi hôi chất thải của mèo nhờ carbohydrate có trong cây Yucca giúp ức chế amoniac trong nước tiểu. Cải thiện hệ miễn dịch của mèo nhờ vào chất saponin của trái Yucca. Ức chế sự phát triển và tấn công của giun tròn ký sinh trong cơ thể của mèo. Nâng c', '57.png', 11);
INSERT INTO `products` VALUES (51, 'Thức Ăn Cho Mèo Con Me-O Kitten 1.1kg – Cải Thiện Kén Ăn', 118000, 'Hạt Me-o cung cấp các loại vi khoáng chất rất quan trọng cho mèo con như Vitamin A, B, D, E, Taurine, các loại Omega-3 và Omega-6 giúp lông mèo chắc khỏe, ít rụng và bóng mượt.', 'Sản phẩm cũng bổ sung vào đó nguồn đạm tốt, giúp đảm bảo cung cấp đầy đủ năng lượng cho mèo con vận động và sinh hoạt hằng ngày. Hạt Me-o cho mèo con có hương vị cá biển, nên kích thích mèo ăn ngon miệng, phù hợp cho những chú mèo con kén ăn hoặc ăn ít.', '58.png', 11);
INSERT INTO `products` VALUES (52, 'Thức Ăn Cho Mèo Con Catsrang Kitten 1.5kg', 210000, 'Hạt có công thức giúp loại bỏ mùi hôi của chất thải mèo và giúp phân chắc hơn, không bị lỏng. Hàm lượng dinh dưỡng trong 1 viên khá nhiều, đủ cho mèo phát triển cơ thể.', 'Hạt giúp da và lông mèo đẹp, bóng mượt hơn cũng như ngăn ngừa được bênh quáng gà. Hoàn toàn không gây hại cho sức khỏe của mèo bởi hạt không có kháng sinh, chất bảo quản, hương nhân tạo hay phẩm màu tổng hợp.', '59.jpg', 11);
INSERT INTO `products` VALUES (53, 'Thức Ăn Cho Mèo Trưởng Thành Ba Tư Royal Canin Persian (2kg)', 453000, 'Thúc đẩy làn da khỏe mạnh và bộ lông dài của mèo Ba Tư mềm mại, sáng bóng với các dưỡng chất Omega 3 (EPA & DHA) , Omega 6 và axit béo. Duy trì hệ tiêu hóa khỏe mạnh bằng cách kích thích quá trình đường ruột với các Protein tiêu hóa cao, prebiotic và chất', 'Bổ sung đầy đủ chất dinh dưỡng cho mọi hoạt động hàng ngày của các bé. Thiết kế hạt theo hình dáng quả hạnh độc quyền giúp cho mèo Ba Tư dễ dàng nhai đồng thời hỗ trợ sức khỏe răng miệng. Thích hợp với mèo Ba Tư trên 12 tháng tuổi.', '60.jpg', 11);
INSERT INTO `products` VALUES (54, 'Thức Ăn Organic Cho Mèo Lớn ANF 6 Free Indoor 6kg', 1233000, 'Là một trong số những sản phẩm cho mèo hiếm hoi trên thị trường được làm từ các nguyên liệu Organic, 100% tự nhiên. Cam kết 6 KHÔNG về sản phẩm: Không có chất đột biến gen, không thuốc kháng sinh, không thuốc trừ sâu, không chất bảo quản, không màu tổng h', 'Công thức đặc biệt giúp mèo cải thiện cân nặng và duy trì hệ miễn dịch tốt. Có chứa các chất giúp lông và da mèo được khỏe mạnh và sáng bóng. Sản phẩm được sản xuất 100% tại Hàn Quốc, nơi có các công nghệ thực phẩm tiên tiến và hàng đầu thế giới.', '61.jpg', 11);
INSERT INTO `products` VALUES (55, 'Thức Ăn Cho Mèo Today’s Dinner 5kg – Giàu Dinh Dưỡng', 400000, 'Đạm thịt gà, đạm cá ngừ thủy phân (giúp cơ thể mèo hấp thu dinh dưỡng trong thời gian ngắn nhất), Vitamin A, B1, B2, B6, B12, vitamin D3 và vitamin E, chất khoảng tổng hợp bao gồm Lysine, kẽm, sắt, Taurine (giúp mượt lông và sáng mắt cho mèo). Sản phẩm có', 'Ngăn ngừa búi lông, giúp đào thải lông rối trong cơ thể mèo nhanh hơn. Cải thiện vị giác của mèo nhờ vào các loại protein dễ hấp thụ cùng hương vị sản phẩm thu hút. Nâng cao sức khỏe hệ tiết niệu bằng những loại khoáng chất giúp cân bằng độ pH trong nước ', '62.jpg', 11);
INSERT INTO `products` VALUES (56, 'Thức Ăn Kiểm Soát Cân Nặng Cho Mèo Royal Canin Fit 32 (10kg)', 1660000, 'Đáp ứng tất cả các nhu cầu dưỡng chất của mèo tuổi trưởng thành, mèo cần dinh dưỡng chất lượng cao. FIT 32 chứa đúng những chất dinh dưỡng có lợi để duy trì sức khỏe tốt cho mèo trưởng thành. Điều chỉnh hàm lượng calo để giúp duy trì trọng lượng lý tưởng ', 'Giúp kích thích loại bỏ búi lông trong bụng các bé nhờ vào hàm lượng chất xơ cụ thể. Công thức giúp cân bằng sức khỏe hệ thống tiết niệu ở mèo trưởng thành giúp bé hạn chế bệnh sỏi thận, 1 bệnh nguy hiểm mà mèo thường mắc phải sau 1 thời gian nuôi lâu dài', '63.jpg', 11);
INSERT INTO `products` VALUES (57, 'Thức Ăn Cho Mèo Mẹ Và Con Royal Canin Mother & Babycat (4kg)', 821000, 'Đáp ứng tất cả các nhu cầu dưỡng chất của mèo tuổi trưởng thành, mèo cần dinh dưỡng chất lượng cao. FIT 32 chứa đúng những chất dinh dưỡng có lợi để duy trì sức khỏe tốt cho mèo trưởng thành. Điều chỉnh hàm lượng calo để giúp duy trì trọng lượng lý tưởng ', 'Cải thiện sức khỏe tiêu hóa: Khi mới sinh, hệ tiêu hóa của mèo con còn non và yếu. Hệ tiêu hóa sẽ phát triển dần trong vài tuần. Đó là lý do tại sao sản phẩm Royal Canin Mother&Babycat cần thiết để hỗ trợ sức khỏe tiêu hóa trong giai đoạn tăng trưởng, góp', '64.jpg', 11);
INSERT INTO `products` VALUES (58, 'Thức Ăn Cải Thiện Da Và Lông Cho Mèo Royal Canin Hair & Skin Care (400g)', 110000, 'Đáp ứng tất cả các nhu cầu dưỡng chất của mèo tuổi trưởng thành, mèo cần dinh dưỡng chất lượng cao. FIT 32 chứa đúng những chất dinh dưỡng có lợi để duy trì sức khỏe tốt cho mèo trưởng thành. Điều chỉnh hàm lượng calo để giúp duy trì trọng lượng lý tưởng ', 'Cải thiện làn da và giúp mèo có bộ lông óng mượt sau một thời gian ngắn sử dụng. Giúp bảo vệ làn da và duy trì được một lớp bảo vệ cho da và lông thông qua công thức dinh dưỡng cân bằng. Cải thiện sự phát triển của lông mèo và giúp ngừa các bệnh phổ biến ', '65.png', 11);
INSERT INTO `products` VALUES (59, 'Natural Core C3 Bene 1.5kg – Đạm Thuỷ Phân', 230000, 'Hạt khô được sản xuất 100% tại Hàn Quốc với công nghệ hiện đại và dây chuyền nghiên cứu kỹ luận do đó thành phần có trong hạt đảm bảo được dinh dưỡng cho mèo ở mỗi giai đoạn. Ngoài ra, sản phẩm còn sử dụng nhiều nguồn đạm từ cá và thịt thật, giúp đa dạng ', 'Đạm thủy phân là một công nghệ đặc biệt, giúp tách rời các Protein thành những phân tử nhỏ hơn, nhằm giúp cho hệ tiêu hóa hấp thu chất dinh dưỡng trong thời gian ngắn. Những phân tử Protein này sẽ đảm bảo cho mèo có được năng lượng để vận động trong ngày ', '47.jpg', 11);
INSERT INTO `products` VALUES (60, 'Sữa Tắm Cho Mèo Con 8in1 Perfect Coat', 222000, 'Thương hiệu Mỹ. Công thức đặc biệt gồm chất Jojoba và Keratin giúp lông chắc khỏe', 'Hương thơm lâu dài', '48.jpg', 12);
INSERT INTO `products` VALUES (61, 'Sữa Tắm Cho Mèo Mượt Lông Beaphar Shampoo Cats', 175000, 'Thương hiệu đến từ Hà Lan đạt tiêu chuẩn an toàn của Châu Âu.Độ pH trung tính phù hợp với mọi loại da dù là da nhạy cảm. Thể tích: 250 ml', 'Sản phẩm chứa công thức làm ẩm da cho mèo hỗ trợ lông mềm mượt và dễ chải. Thích hợp với tất cả giống mèo trên 12 tháng tuổi.', '66.jpg', 12);
INSERT INTO `products` VALUES (62, 'Sữa Tắm Olive Essence Dành Riêng Cho Mèo', 90000, 'Chiếc xuất từ dầu ô liu tự nhiên, không gây kích ứng cho làn da nhạy cảm của mèo', 'Hương thơm dịu nhẹ, khả năng khử mùi tốt, tạo hương thơm dễ chịu trong thời gian dài. Khả năng làm sạch tốt đồng thời bổ sung độ ẩm giúp lông mèo mền mượt, không xơ rối, không gây kích ứng và an toàn cho mèo của bạn', '67.jpg', 12);
INSERT INTO `products` VALUES (63, 'Sữa Tắm Joyce & Dolls Jasmine Hương Hoa Cho Chó Mèo', 155000, 'Chiếc xuất từ tinh chất hoa nhài, hoàn toàn tự nhiên , không gây kích ứng cho làn da nhạy cảm của thú cưng', 'Khả năng lưu hương vuột trội, kéo dài trong vài ngày sau khi tắm, giúp thú cưng của bạn luôn trong trạng thái sạch sẽ và thơm tho. Hương hoa nhài còn giúp an thần, thư giãn, xua đuiổi côn trùng', '68.jpg', 12);
INSERT INTO `products` VALUES (64, 'Sữa Tắm Chống Ngứa Do Bọ Ve Cắn Tropiclean 355ml', 395000, 'Sản phẩm sử dụng các chất được gọi là Alpha Hydrosys có chức năng làm dịu các vết tổn thương do bọ ve cắn trên da thú cưng. Alpha Hydrosys không những giúp làm dịu vết cắn mà còn giúp tăng sinh collagen và các tế bào trên da nhằm giúp vết thương của thú c', 'Hiểu được điều này, các sản phẩm trị ve bọ chét cho thú cưng trở nên rất phổ biến. Tuy nhiên, sản phẩm giúp cải thiện tình trạng da của thú cưng khi bị ve bọ chét cắn thì lại hiếm hơn. Đây là lúc sữa tắm giúp giảm ngứa và khó chịu do ve và bọ chét cắn phá', '69.png', 12);
INSERT INTO `products` VALUES (65, 'Sữa Tắm Cho Mèo Enoug SOS 530ml – Bảo Vệ Da – Đài Loan', 130000, 'Thành phần chứa hầu hết các nguyên liệu thiên nhiên được sản xuất từ tinh hoa thực vật. Độ PH có trong sản phẩm chiếm 7-7,14, hỗ trợ cân bằng độ PH nhằm giữ âm và đem lại cho mèo 1 bộ lông bóng mượt. Các sinh vật kháng khuẩn có trong sản phẩm giúp tiêu di', 'Tinh dầu tự nhiên từ thực vật mang đến hương thơm dịu giúp khử mùi, lưu hương đến hơn 1 tuần, đảm bảo an toàn cho thú cưng và chủ nuôi. Loại bỏ da chết và bụi bẩn trên lông mèo.', '49.png', 12);
INSERT INTO `products` VALUES (66, 'Vòng Cổ Mèo Ferplast Ergoflex (22cm)', 219000, 'Vòng cổ cho mèo được nhập khẩu từ Ý. Được làm từ cao su tự nhiên', 'Chống thấm nước, thoáng mát. Hạn chế bám mùi sau khi sử dụng', '50.jpg', 13);
INSERT INTO `products` VALUES (67, 'Kính Mát Bảo Vệ Mắt Cho Chó Mèo 8×6.5cm', 45000, 'Được làm từ các vật liệu hoàn toàn an toàn với lông và da của thú cưng. Thân kính có kích thước là 8cm, chiều dài gọng là 6.5cm, đường kính của tròng là 3cm. Phù hợp với tất cả các giống mèo và chó có kích cỡ nhỏ.', 'Sản phẩm được dùng để đeo cho chó mèo khi bạn muốn đưa chúng ra ngoài chơi. Được thiết kế rất thời trang, và sẽ khiến cho chó mèo trông sang chảnh hơn.', '51.png', 13);
INSERT INTO `products` VALUES (68, 'Vòng cổ mèo Diamond 30cm', 30000, 'Họa tiết  ngộ nghĩnh và đáng yêu. Nhiều màu cho bạn lựa chọn. Chất liệu chắc chắn và thiết kế dày dặn cho độ bền cao, đồng thời tạo cảm giác êm ái khi đeo. Có kèm lục lạc leng keng để bạn dễ dàng biết được chú thú cưng đang ở đâu. Thiết kế khóa bấm giúp b', 'Có tác dụng giúp bạn giữ chặt và theo sát chú thú cưng của bạn. Thiết kế ngộ nghĩnh và đáng yêu của chiếc vòng cổ Diamond. Vòng cổ cho mèo còn là điểm nhấn nổi bật để chú thú cưng của bạn trông thật “sành điệu” trong mọi chuyến đi dạo hoặc chạy bộ đầy hứn', '70.jpg', 13);
INSERT INTO `products` VALUES (69, 'Chuông hình đeo cổ cho thú cưng 26mm', 20000, 'Hãy cùng chuông màu đẹp mắt để bảo vệ và trang trí cho cún yêu thêm kute nhé. Có đủ màu và size cho bạn lựa chọn', 'Luôn là sự lựa chọn hàng đầu của bạn cho thú cưng của mình để cún nhà bạn đáng yêu hơn nữa với chuông màu, ngoài ra nó còn giúp bạn bảo vệ cún đấy. Nó sẽ phát ra âm thanh keng keng giúp bạn biết cún yêu nhà mình đang ở chỗ nào.', '71.jpg', 13);
INSERT INTO `products` VALUES (70, 'Chụp bảo vệ khi dùng thuốc', 97000, 'Được làm từ chất liệu cao cấp, an toàn không gây hại.', 'Đây là dụng cụ an toàn  cho bạn khi cho cún cưng tiêm thuốc. Bạn có thể yên tâm rằng khi tiêm thuốc sẽ không còn bị chó cưng quay lại cắn vào tay nữa.', '72.jpg', 13);
INSERT INTO `products` VALUES (71, 'Dây dắt yên ngựa tròn kèm nơ 0.6x130cm', 98000, 'Bền chắc, giá hợp lý: Chất liệu vải dù giúp dây dắt chó có yếm và tay cầm trợ lực có sự chắc chắn, tạo độ bền rất cao so với các sản phẩm dây dắt chó làm bằng chất liệu khác. Bên cạnh đó thiết kế dày dặn cũng tăng thêm độ bền của dây dắt chó và tạo cảm gi', 'Hình thức đẹp mắt, màu sắc tươi sáng của dây dắt chó còn rất phù hợp, giúp tô điểm thêm vẻ đẹp của các chú chó kể cả với các màu lông khác nhau.', '73.jpg', 13);
INSERT INTO `products` VALUES (72, 'Gel Cho Mèo Gimcat Anti Hairball 50g – Trị Búi Lông – Đức', 165000, 'Sản phẩm bổ sung cellulose và beta-glucan giúp tăng khả năng đẩy phần lông thừa trong bao tử của mèo. Ngoài ra, beta-glucan còn là một chất giúp chống kích ứng đường tiêu hóa, rất tốt trong việc cải thiện khả năng tiêu hóa của mèo.', 'Bạn có thể cho mèo ăn 6cm gel mỗi ngày. 1cm tương đương 0.5g. Bạn có thể cho mèo liếm trực tiếp trên tay, trộn với thức ăn hoặc pha loãng với nước nếu mèo kén ăn.', '52.png', 14);
INSERT INTO `products` VALUES (73, 'Gel Dinh Dưỡng Gimcat Derma 50g – Trị Viêm Da', 190000, 'Sản phẩm có công thức riêng biệt chứ Omega 3 và 6 giúp cải thiện tình trạng khô da ở mèo. Ngoài ra, gel còn có axit linoleic giúp tăng cường miễn dịch cho da và lông. Các chất dinh dưỡng trong gel được chiết xuất từ tảo chlorella giúp cung cấp vitamin và ', 'Sản phẩm được đặc chế để chuyên hỗ trợ điều trị và phòng ngừa các bệnh liên quan đến viêm da ở mèo. Phù hợp cho mèo trưởng thành trên 12 tháng tuổi. Sản phẩm giúp cho da mèo duy trì được độ cân bằng pH và tăng cường miễn dịch cho da một cách tự nhiên.', '74.png', 14);
INSERT INTO `products` VALUES (74, 'Snack Ăn Sạch Răng Cho Mèo Feline Greenies 595g', 800000, 'Chicken Meal, Ground Wheat, Brewers Rice, Corn Gluten Meal, Poultry Fat (Preserved with Mixed Tocopherols), Oat Fiber, Natural Poultry Flavor, Ground Flaxseed, Brewers Dried Yeast, Potassium Chloride, Calcium Carbonate, Salt, Choline Chloride, Citric Acid', 'Sản phẩm này có chức năng hỗ trợ điều trị cho mèo. Cụ thể là giúp làm sạch răng mèo, lấy đi các cao răng và bám bẩn. Từ đó nâng cao chất lượng răng miệng và đảm bảo mèo có thể ăn uống khỏe mạnh hơn. Snack Greenies còn được nghiên cứu với công thức đặc biệ', '75.jpg', 14);
INSERT INTO `products` VALUES (75, 'Gel Vệ Sinh Răng Chó Mèo Beaphar Tooth Gel (100g)', 181000, 'Gel vệ sinh răng sở hữu các loại Enzyme đặc biệt tốt trong việc đánh bật các vết bẩn, mảng bám trên răng của chó mèo.', 'Có thể sử dụng hằng ngày, dùng kèm hoặc dùng riêng với các sản phẩm răng miệng khác đều tốt. Hoàn toàn an toàn với chó mèo, phù hợp với mọi lứa tuổi.', '76.jpg', 14);
INSERT INTO `products` VALUES (76, 'Xịt Trị Viêm Da, Ghẻ Có Mủ Alkin Fabricil 50ml ', 155000, 'Fabricil là một trong những sản phẩm trị viêm da, ghẻ da có mủ khá nổi tiếng và phổ biến vì tính hiệu quả và đặc trị. Sản phẩm có khả năng thẩm thấu cao để tăng tính hiệu quả trong thời gian ngắn.', 'Ngoài khả năng kháng khuẩn, giúp cho da của thú cưng mau lành bệnh, thì sản phẩm cũng giúp giảm ngứa và giảm cảm giác châm chích trên cơ thể thú cưng. Sản phẩm phù hợp và an toàn với chó mèo từ 8 tuần tuổi trở lên.', '77.png', 14);
INSERT INTO `products` VALUES (77, 'Xịt Trị Ve, Rận, Ký Sinh Trùng Alkin Mitecyn 50ml', 155000, 'Alkin Mitecyn là một trong những sản phẩm nổi tiếng về đặc trị ve, rận và ký sinh trùng ở thú cưng.', 'Sản phẩm có khả năng thẩm thấu cao vì vậy giúp thuốc xịt hiệu quả hơn trong thời gian ngắn nhất. Sản phẩm phù hợp với cả chó và mèo trên 12 tuần tuổi.', '78.png', 14);
INSERT INTO `products` VALUES (78, 'Bọt Nước Làm Sạch Chân Chó Mèo Cature Purelab 150ml', 170000, 'Bọt làm sạch chân Cature Purelab giúp lấy sạch các vết bẩn bám vào các vùng đệm trên chân của chó mèo. Sản phẩm còn có chức năng giữ ẩm giúp cho các đệm chân của thú cưng luôn mềm.', 'Bọt làm sạch chân còn được đi kèm với bàn chải được làm từ sợi silicon giúp lấy sạch các vết bẩn bám trên chân của chó mèo. Ngoài ra bọt còn có chức năng giảm ngứa, giúp cho thú cưng luôn cảm thấy thoải mái mỗi khi bạn làm vệ sinh chân của chúng. Bàn chải', '79.png', 14);
INSERT INTO `products` VALUES (79, 'Bộ Trồng Cỏ Mèo Tươi Bioline 12g – Bổ Sung Chất Xơ, Giảm Stress', 55000, 'Cỏ mèo (cỏ bạc hà) là một loại thực vật rất tốt cho sức khoẻ của mèo, vì cỏ bạc hà giúp mèo giảm căng thẳng và thư giãn cơ thể. Thông thường, bạn có thể dùng cỏ mèo khô. Tuy nhiên, cỏ mèo tươi tự trồng sẽ giúp bổ sung chất xơ vì một số chú mèo có thói que', 'Việc chăm sóc cỏ mèo cũng đơn giản, không tốn của ban quá nhiều thời gian và cũng giúp cho bạn thư giãn hơn với việc tưới tiêu sau một ngày làm việc mệt nhọc. Mèo có thể dùng được bộ sản phẩm cỏ mèo từ 2 tuần đến 1 tháng, nếu cỏ mèo được tưới tiêu và chăm', '80.jpg', 15);
INSERT INTO `products` VALUES (80, 'Cỏ Mèo Khô Dạng Ống Bioline 5g – Giúp Mèo Giảm Stress', 35000, 'Cỏ mèo là một loài thực vật có trong tự nhiên, có ảnh hưởng tới hệ thần kinh của mèo.', 'Cỏ mèo không những giúp cho chúng cảm thấy thư giãn hơn mà còn giúp giãn cơ thể. Từ đó, mèo sẽ có nhiều thời gian cho cơ thể nghỉ ngơi hơn. Sản phẩm được làm từ cỏ mèo khô nguyên chất, có hiệu quả cao và không gây hại cho thú cưng. Cỏ mèo là một trong nhữ', '81.jpg', 15);
INSERT INTO `products` VALUES (81, 'Đường Hầm Sáng Tạo 12 Đoạn Hagen Catit Circuit', 606000, '100% được sản xuất tại Canada.  An toàn, không gây hại tới sức khỏe của mèo.', 'Dễ dàng gắn nối với 100 kiểu khác nhau. 12 đoạn và 1 quả bóng chạy bên trong. Kích thích sự tò mò của mèo. Hạn chế tình trạng lười biếng, giảm stress cho mèo', '82.png', 15);
INSERT INTO `products` VALUES (82, 'Đồ Chơi Mèo Quào Hình Trái Tim Mon Ami Toy Cat', 88000, 'Sản xuất tại Việt Nam, Chất liệu tốt, có độ bền cao', 'Kích thích sự tò mò của mèo', '83.jpg', 15);
INSERT INTO `products` VALUES (83, 'Cần Câu Cá Đồ Chơi Mon Ami Toy Cat', 25000, 'Sản xuất tại Việt Nam, Chất liệu tốt, có độ bền cao', 'Kích thích sự tò mò của mèo', '84.jpg', 15);
INSERT INTO `products` VALUES (84, 'Đồ Chơi Bùng Binh Pawise Play', 148000, 'Sản xuất tại Việt Nam, Chất liệu tốt, có độ bền cao', 'Kích thích sự tò mò của mèo. Có banh để mèo khều, giúp hạn chế lười nhát ở mèo.', '85.jpg', 15);
INSERT INTO `products` VALUES (85, 'Đồ Chơi Nhồi Bông Hình Rắn AFP Modern Cat Feather', 73000, 'Nhập khẩu từ Pháp, Có tiếng kêu khơi dậy trí tò mò của mèo, Có thể chuyển động được', 'Kích thích sự tò mò của mèo', '86.jpg', 15);
INSERT INTO `products` VALUES (86, 'Đường Hầm Đồ Chơi AFP Lamb Find Me', 325000, 'Thiết kế từ Pháp, Có catnip bên trong giúp thu hút sự tò mò của mèo', 'Hỗ trợ giải tỏa tâm lý cho mèo được nuôi một mình, Giúp mèo thư giãn', '87.jpg', 15);
INSERT INTO `products` VALUES (87, 'Đồ Chơi Nhồi Bông Hình Chuột AFP Green Rush', 99000, 'Sản xuất tại Việt Nam, Chất liệu tốt, có độ bền cao', 'Có nhồi catnip bên trong, giúp mèo thư giãn thoải mái', '88.jpg', 15);
INSERT INTO `products` VALUES (88, 'Cần Câu AFP Dreams Catcher Ranga', 146000, 'Thiết kế từ Pháp, Sử dụng lông vũ tự nhiên, không gây hại cho mèo khi chơi', 'Giải tỏa cơn ngứa móng ở mèo.  Giúp mèo không cào đồ đạc trong nhà', '89.jpg', 15);
INSERT INTO `products` VALUES (89, 'Ổ Nệm Giá Rẻ Cho Chó Mèo Hình Tròn', 150000, 'Sản phẩm được thiết kế gọn, nhẹ, tiện lợi phù hợp để đặt ở bất kỳ đâu, chất liệu vải mềm, mịn, đảm bảo an toàn không gây kích ứng cho vật nuôi. Sản xuất theo tiêu chuẩn thích hợp với thời tiết tại các nước Đông Nam Á mang lại sự ấm áp cho thú cưng vào nhữ', 'Mang lại cảm giác thư giãn, êm ái, và dễ dàng đi sâu vào giấc ngủ. Hỗ trợ nâng đỡ xương, cải thiện sức khỏe, đem đến không gian riêng an toàn, thoải mái và 1 giấc ngủ trọn vẹn cho thú cưng. Bạn có thể dễ dàng giặt sạch sản phẩm bằng máy giặt cho những lần', '90.png', 16);
INSERT INTO `products` VALUES (90, 'Giường Thư Giãn Cho Mèo Hagen Catit', 573000, 'Được sản xuất tại Canada, hàng công ty xuất khẩu về Việt Nam. Bao gồm những cơ chế massage đầu, cổ, mặt, Bàn chải được thiết kế để có thể lấy đi lông chết hoặc bệnh, Vật liệu nhựa cao cấp, không chưa BPA, không ảnh hưởng đến sức khỏe mèo', 'Giường thông minh, vừa giúp mèo nằm thoải mái, vừa giúp chúng thư giãn', '91.png', 16);
INSERT INTO `products` VALUES (91, 'Sofa Mèo Mon Ami Beddy (55cm)', 226000, 'Sản xuất tại Việt Nam, Sử dụng vật liệu thân thiện, không gây khó chịu cho mèo', 'Giúp mèo nghỉ ngơi, đảm bảo giấc ngủ', '92.jpg', 16);
INSERT INTO `products` VALUES (92, 'Nhà gà con', 399000, 'Ngôi nhà được làm từ chất liệu cotton thông thoáng, dễ vệ sinh và phù hợp với khí hậu nóng ẩm ở Việt Nam. Bề mặt nằm có lớp lót cotton êm cùng thiết kế hình ngôi nhà với 3 mặt bao quanh nhằm tạo cho thú cưng của bạn cảm giác được che chở an toàn và ấm áp.', 'Nhà cho thú cưng sử dụng gam màu nổi bật kết hợp với những đường kẻ sọc cá tính, đây chắc chắn sẽ là nơi thư giãn lý tưởng, làm hài lòng những chú cún con xinh xắn.', '93.jpg', 16);
INSERT INTO `products` VALUES (93, 'Cây mèo leo 3 tầng', 4930000, 'Các sản phẩm dành cho thú cưng với chất lượng tốt nhất, an toàn nhất với 95% sản phẩm đã được xuất khẩu sang thị trường Châu Âu và Châu Mỹ.', 'Cây mèo leo 3 tầng sẽ giúp bạn tiết kiệm không gian và cho mèo một khu sinh hoạt đầy đủ nhất. Mèo sẽ leo lên cao khi vui chơi và nghỉ ngơi ở dưới khi cần ngủ.', '94.jpg', 16);
INSERT INTO `products` VALUES (94, 'Lồng sơm tĩnh điện cho mèo ', 320000, 'Chuồng mèo 3 tầng sơn tĩnh điện nan ống', '\"Với thiết kế nhiều tầng, nan ống to cực kỳ chắc chắn, dễ dàng di chuyển.', '95.jpg', 16);
INSERT INTO `products` VALUES (95, 'Nệm khỉ con', 355000, 'Chất liệu cotton thông thoáng, dễ vệ sinh, rất phù hợp với khí hậu nóng ẩm ở Việt Nam. Bề mặt nằm có 2 lớp nệm tạo sự êm ái, thú cưng nhà bạn sẽ luôn có cảm giác được nâng niu và yêu chiều.', 'Thiết kế sinh động với gam màu nổi bật và hình ngộ nghĩnh họa tiết mang đến sự quen thuộc và gần gũi cho thú cưng đáng yêu trong nhà.', '96.jpg', 16);
INSERT INTO `products` VALUES (96, 'Balo vận chuyển chó mèo Phi hành gia (da)', 479000, 'Chất liệu da mềm mại, thoáng khí. 2 cửa tích hợp (cầu tròn, lưới phẳng) dễ dàng thay đổi. ', 'Thiết kế phi hành gia độc đáo, dễ thương, Màu sắc nổi bật, bắt mắt', '97.jpg', 17);
INSERT INTO `products` VALUES (98, 'Vali Vận Chuyển Gấp Lại Pawise Travel', 1360000, 'Thương hiệu nổi tiếng ở Châu Âu và Mỹ, Thiết kế thoáng mát, giúp thú cưng cảm thấy thoải mái khi di chuyển', 'Sử dụng để vận chuyển thú cưng đi xa như trên máy bay hay tàu hỏa. Dễ dàng gấp lại, gọn nhẹ và đơn giản', '99.jpg', 17);
INSERT INTO `products` VALUES (99, 'Balo di chuyển phi hành gia (nhựa trong)', 399000, 'Điểm đặc biệt của balo là nhựa trong sang trọngSản phẩm được làm từ những chất liệu thân thiện, không độc hại và nhất là dễ dàng lau chùi khi bám bẩn', 'Với sản phẩm này, chó mèo cưng của bạn có thể nhìn ra thế giới và tận hưởng phong cảnh, nhìn ngắm bên ngòai, tương tác với thế giới bên ngoài', '100.jpg', 17);
INSERT INTO `products` VALUES (100, 'Túi xách vận chuyển thú cưng bằng vải lớn', 15500, 'Túi xách vận chuyển cho chó mèo, kiểu dáng và màu sắc đẹp, hấp dẫn thú cưng nhà bạn, chất liệu bền, chắc chắn', 'Với sản phẩm này, chó mèo cưng của bạn có thể nhìn ra thế giới và tận hưởng phong cảnh, nhìn ngắm bên ngòai, tương tác với thế giới bên ngoài', '101.jpg', 17);
INSERT INTO `products` VALUES (101, 'Lồng vận chuyển chó mèo', 910000, 'Chất liệu lồng bằng nhựa cao cấp thoáng mát và cửa khung thép chắc chắn, cầm chắc tay.', 'Với sản phẩm này, chó mèo cưng của bạn có thể nhìn ra thế giới và tận hưởng phong cảnh, nhìn ngắm bên ngòai, tương tác với thế giới bên ngoài', '102.jpg', 17);
INSERT INTO `products` VALUES (102, 'Khay Vệ Sinh 49cm Mon Ami Hygiene', 198000, 'Vật liệu thiết kế gọn nhé, có độ bền cao. Thiết kế để mèo dễ dàng đi vệ sinh và lấp chất thải', 'Áp dụng công nghệ nước ngoài giúp hạn chế mùi hôi chất thải', '103.jpg', 18);
INSERT INTO `products` VALUES (103, 'Chén Ăn Chậm Nhiều Lỗ Hagen Catit – Trị Mèo Lười Ăn', 345000, 'Được sản xuất và kiểm định tại Canada, nhập khẩu theo đường chính ngạch về Việt Nam, 100% chính hãng, đảm bảo về chất lượng sản phẩm.', 'Khuyến khích mèo tự lấy đồ ăn. Giảm thiểu bệnh lười biếng ở mèo. Kích thích sự phát triển về thể chất của mèo. Hạn chế không cho mèo ăn quá nhiều, dễ gây béo phì, thừa cân.', '104.png', 18);
INSERT INTO `products` VALUES (104, 'Khay Trồng Cỏ Mèo Hagen Catit', 343000, 'Thương hiệu Canada,  Áp dụng kết cấu hiện đại, giúp cân bằng lượng nước để cỏ phát triển tốt', 'Sử dụng công nghệ cải tiến, giúp giữ đất tối ưu để trổng cỏ mèo, Có lưới đặc biệt giúp ngăn không cho mèo bới đất', '105.jpg', 18);
INSERT INTO `products` VALUES (105, 'Chén Ăn Thông Minh Cho Mèo Hagen Catit – Kiểm Soát Thức Ăn', 575000, 'Thương hiệu Canada, được sản xuất và kiểm định khắc khe theo tiêu chuẩn Bắc Mỹ. Thiết kế có nhiều bậc giúp tăng độ khó khi lấy thức ăn. Chân đế cố định chắc chắn', 'Giúp cải thiện sự phát triển ở mèo. Miệng ống mở rộng giúp dễ đặt thức ăn .Kích thích bản năng kiếm thức ăn tự nhiên ở mèo', '106.png', 18);
INSERT INTO `products` VALUES (106, 'Chén Melamine Đôi Mon Ami Bowl', 68000, 'Sản xuất tại Việt Nam, Vật liệu thân thiện với chó mèo', 'Thiết kế phù hợp với chiều cao của mọi giống chó mèo', '107.jpg', 18);
INSERT INTO `products` VALUES (107, 'Tô Inox Mon Ami Bowl', 53000, 'Sản xuất tại Việt Nam, Vật liệu thân thiện với chó mèo', 'Thiết kế phù hợp với chiều cao của mọi giống chó mèo', '108.jpg', 18);
INSERT INTO `products` VALUES (108, 'Chén Inox Màu Kem Hình Xương Pugmarks Feedy (1.8l)', 131000, 'Thương hiệu Ấn Độ, Inox cao cấp, dễ chà rữa và không bám mùi', 'Thiết kế phù hợp với chiều cao của mọi giống chó mèo', '109.jpg', 18);
INSERT INTO `products` VALUES (109, 'Chén Nhựa Họa Tiết Cá Pawise Feeding', 41000, 'Thương hiệu nổi tiếng ở Châu Âu và Mỹ, Nhựa tổng hợp an toàn cho thú cưng', 'Thiết kế thấp, thú cưng không phải rướn khi ăn', '110.jpg', 18);
INSERT INTO `products` VALUES (110, 'Chén Nhựa Ăn Chậm Ferplast Magnus', 271000, 'Đồ dùng cho chó mèo được nhập khẩu từ Ý', 'Hạn chế tình trạng ăn nhanh, gây béo phì và các bệnh tiêu hóa, Có đế chống trượt, giúp chén không di chuyển khi thú cưng ăn', '111.jpg', 18);
INSERT INTO `products` VALUES (111, 'Quần Áo Cho Thú Cưng Giá Rẻ Hoạt Tiết Totoro ', 45000, 'Sản phẩm được sản xuất theo tiêu chuẩn bền, đẹp và đảm bảo an toàn cho thú cưng khi sử dụng, không gây kích ứng, không làm các bé khó chịu và đặc biệt là hoàn toàn phù hợp với điều kiện khí hậu tại các nước châu Á. Chất liệu vải dày vừa đủ để mang đến cảm', 'Mang lại cảm giác dễ chịu và an toàn cho thú cưng khi ở trong nhà lẫn lúc ra ngoài. Sản phẩm có nhiều họa tiết khác nhau, màu sắc đa dạng giúp bạn dễ dàng lựa chọn và thay đổi vẻ ngoài cho các bé trở nên đáng yêu hơn.', '112.png', 19);
INSERT INTO `products` VALUES (112, 'Quần Áo Cho Thú Cưng Giá Rẻ Họa Tiết Gấu Foot Ball Hồng', 90000, 'Sản phẩm đảm bảo an toàn, thoải mái cho thú cưng với thiết kế phù hợp thời tiết tại Việt Nam, không mang lại cảm giác nóng cũng như giữ ấm cho các bé vào những ngày trời lạnh. Đường chỉ được may chắc chắn cùng chất liệu vải bền bỉ giúp bạn dễ dàng giặt sạ', 'Mang lại vẻ đáng yêu cho thú cưng của bạn, khi ra ngoài không lo bị lạnh, đem tới cảm giác an toàn cho các bé.', '113.png', 19);
INSERT INTO `products` VALUES (113, 'Quần Áo Cho Thú Cưng Giá Rẻ Hoạt Tiết Sư Tử Xanh Lá', 90000, 'Sản phẩm đảm bảo an toàn, thoải mái cho thú cưng với thiết kế phù hợp thời tiết tại Việt Nam, không mang lại cảm giác nóng cũng như giữ ấm cho các bé vào những ngày trời lạnh. Đường chỉ được may chắc chắn cùng chất liệu vải bền bỉ giúp bạn dễ dàng giặt sạ', 'Mang lại vẻ đáng yêu cho thú cưng của bạn, khi ra ngoài không lo bị lạnh, đem tới cảm giác an toàn cho các bé.', '114.png', 19);
INSERT INTO `products` VALUES (114, 'Áo cho thú cưng lông mềm mịn gấu nâu', 150000, 'Lông mềm mịn, Có dạng chui tiện lợi, Bo gấu ấm áp', 'Áo cho thú cưng lồng mềm mịn gấu nâu là sản phẩm không thể thiếu khi mùa đông về. Boss sẽ trông thật sành điệu nhưng không kém phần ấm áp khi khoác lên mình ', '115.jpg', 19);
INSERT INTO `products` VALUES (115, 'Áo phao lót bông cho thú cưng khủng long xanh đen', 99000, 'Phao lót bông dày dặn, Khuy bấm chắc chắn, dễ mặc, Gấu áo bo chun ấm áp', 'Áo phao lót bông cho chó mèo thú cưng là sản phẩm không thể thiếu khi mùa đông về. Boss sẽ trông thật sành điệu nhưng không kém phần ấm áp khi khoác lên mình', '110.jpg', 19);
INSERT INTO `products` VALUES (116, 'Súp Kem Thưởng Cho Mèo Sakura 14g', 10000, 'Sản phẩm được xay nhuyễn, phù hợp cho mèo ở mọi lứa tuổi và hoàn toàn không gây hại đến cho hệ tiêu hoá của mèo. Súp kem thưởng có 3 vị là gà, cá ngừ và cá hồi để bạn có thể thay phiên nhau cho mèo ăn để mèo không cảm thấy bị ngán khi ăn quá nhiều một vị.', 'Kem thưởng là món snack mà không một chú mèo nào sẽ từ chối. Có những chú mèo chỉ thích ăn kem thưởng thay cho cả thức ăn chính hay pate. Chính điều này mà bạn sẽ đau đầu vì không biết tìm nguồn kem thưởng ở đâu có giá thành hợp lý để có thể cho mèo ăn th', '117.jpg', 20);
INSERT INTO `products` VALUES (117, 'Pate Cho Mèo Ciao 14gx50 – Mix Vị', 395000, 'Pate Ciao 14g có điểm mạnh là đa dạng hương vị, các loại thịt cá khác nhau và dễ tiêu hóa (do thức ăn đã được xay nhuyễn thành dạng sốt), từ đó giúp cho mèo ăn dễ dàng hơn và không ảnh hưởng nhiều đến hệ tiêu hóa của chúng.  Các nguyên liệu có trong sản p', 'Nhờ sử dụng công nghệ Nhật Bản nên các thanh pate Ciao luôn có vị ngon đặc trưng riêng, kích thích vị giác của mèo và giúp mèo không cảm thấy ngán trong các bữa ăn hằng ngày.', '118.png', 20);
INSERT INTO `products` VALUES (118, 'Pate Inaba Kin No Dashi Cream 30gx2 – Trộn Vị ', 30000, 'Nước dùng Dashi với công thức đặc biệt kết hợp từ rong biển và cá ngừ bào tốt cho sức khỏe. Sản phẩm có chứa tinh chất trà xanh giúp chống lão hóa và hỗ trợ tiêu hóa, giảm mùi hôi của chất thải. Bổ sung Omega 3 & 6 mang lại cho thú cưng bộ lông luôn mềm m', 'Thúc đẩy đôi mắt của mèo tinh anh hơn nhờ vào thành phần taurine trong sản phẩm. Bảo vệ hệ bài tiết tránh các bệnh về tiết niệu như sỏi thận với pate dạng cream. Mỗi vị đều được làm từ những nguyên liệu khoái khẩu nhằm kích thích vị giác.', '119.jpg', 20);
INSERT INTO `products` VALUES (119, 'Pate Cho Mèo Wanpy 80g – Trộn Vị – Bổ Sung Protein', 20000, 'hành phần 100% tự nhiên không phẩm màu, không chất phụ gia. Sản phẩm chứa thịt, cá và rau củ giúp bổ sung Protein, tốt cho hệ tiêu hóa.Cung cấp Taurine cho đôi mắt thú cưng luôn tinh anh. Hàm lượng Omega 3 & 6 mang lại cho mèo bộ lông mềm mượt hơn. Vitami', 'Mỗi vị đều được kết hợp từ những hương vị khoái khẩu khác nhau dành cho mèo. Thực phẩm ướt giúp bảo vệ hệ bài tiết, tránh mắc bệnh sỏi thận. Cho mèo sử dụng trực tiếp hoặc trộn với hạt để kích thích vị giác. Phù hợp với mọi giống mèo ở mọi độ tuổi.', '120.jpg', 20);
INSERT INTO `products` VALUES (120, 'Thức ăn cho mèo thạch thịt gà 5Plus 70g', 17000, 'Sản phẩm chọn nguyên liệu tươi tự nhiên chất lượng cao, tất cả các nguyên liệu được kiểm tra nghiêm ngặt Không thêm chất bảo quản, không thêm chất màu, không thêm chất hấp dẫn Bổ sung Vitamin, fructooligosaccharide, taurine. Cung cấp nguồn protein tự nhiê', 'Giúp ổn định hệ thống vi khuẩn đường ruột, tiêu hóa khỏe, mèo ăn ngon. Đầy đủ dưỡng chất cần thiết cho mèo. An toàn cho hệ tiêu hóa, sử dụng tốt cho cả mèo con và mèo đang mang bầu. Bổ sung cả vitamin E giúp bảo vệ da và lông.', '121.jpg', 20);
INSERT INTO `products` VALUES (121, 'Pate MONGE VETSOLUTION CAT RECOVERY dinh dưỡng phục hồi dành 100g', 30000, 'Sản phẩm dành cho chó có công thức chế biến chuyên dành cho việc thúc đẩy, phục hồi cho thú bệnh và sau khi bệnh. Với thành phần hạt giống cây kế giúp tăng khả năng phục hồi, nucleotide tăng cường miễn dịch, Xylo-oli-gosaccharides (XOS) cân bằng hệ vi sin', 'Giúp ổn định hệ thống vi khuẩn đường ruột, tiêu hóa khỏe, mèo ăn ngon. Đầy đủ dưỡng chất cần thiết cho mèo. An toàn cho hệ tiêu hóa, sử dụng tốt cho cả mèo con và mèo đang mang bầu. Bổ sung cả vitamin E giúp bảo vệ da và lông.', '122.jpg', 20);
INSERT INTO `products` VALUES (122, 'Pate Royal Canin - Recovery 195g (hồi phục sức khỏe cho chó mèo)', 60000, 'Thịt gà, gan gà, phụ phẩm gelatin, xenluloza bột, casein, dầu cá, hương vị tự nhiên, tetrapotassium pyrophosphate, dầu thực vật, canxi cacbonat, canxi sunfat, sản phẩm trứng khô, guar gum, sản phẩm phụ thịt lợn, Taurine, natri tripolyphosphate, clorua cho', 'Hàm lượng năng lượng của ROYAL CANIN RECOVERY giúp bù đắp sự sụt giảm lượng thức ăn đối với vật nuôi kén chọn ăn uống. Kết cấu của ROYAL CANIN RECOVERY giúp việc cho ăn bằng ống tiêm hoặc ống truyền dễ dàng hơn rất nhiều. EPA/DHA, Axit béo Omega-3 chuỗi d', '123.png', 20);
INSERT INTO `products` VALUES (123, 'Súp thưởng Ciao vị cá ngừ bổ sung Collagen cho mèo (14g*4) thanh lẻ', 20000, 'Cá ngừ, chiết xuất cá ngừ, thủy phân protein, đường (oligosacarit), dầu thực vật, tinh bột (tinh bột biến tính) Khoáng chất, chất làm đặc, gia vị (axit Amino), Vitamin E, chiết xuất trà xanh, màu mon Damascus.', 'Sản phẩm này không dùng thay thế bữa ăn chính. Luôn giữ cung cấp nước sạch thường xuyên.', '124.jpg', 20);
INSERT INTO `products` VALUES (124, 'Pate Morando cho mèo cá và tôm 400gr', 60000, 'Dòng Morando Professional cho mèo trưởng thành được chế biến theo công thức đột phá, có hàm lượng dinh dưỡng cho sức khỏe mèo. Giàu Vitamin C, E (chất chống oxy hoá), B (tốt cho hệ thần kinh), canxi và phốt pho (cho xương và răng chắc khỏe), omega 3 và 6 ', 'Hương vị thịt cá và tôm thơm ngon khiến chú mèo của bạn không thể cưỡng lại, kích thích vị giác, giúp mèo ăn ngon miệng hơn. ', '125.jpg', 20);
INSERT INTO `products` VALUES (125, 'Pate Cho Mèo Trưởng Thành Whiskas 85g – Vị Cá Ngừ', 20000, 'Cải thiện lông bóng mượt và mềm mại với Omega 3 & 6 cùng axit béo. Ngăn ngừa bệnh sỏi thận, bảo vệ hệ bài tiết.  Kích thích vị giác với vị cá ngừ khoái khẩu.', 'Dùng trực tiếp hoặc trộn chung với hạt để kích thích ngon miệng.  Thích hợp với mọi giống mèo trên 1 tuổi. Thành phần taurine giúp mèo có đôi mắt luôn tinh anh. Vitamin và chất khoáng hỗ trợ tăng cường hệ miễn dịch.', '126.jpg', 20);
INSERT INTO `products` VALUES (126, 'Pate Tươi Cho Mèo Gimcat 70g – Thịt Cá Ngừ & Tôm', 30000, 'Pate tươi Gimcat làm từ 100% các sản phẩm tươi, bạn sẽ thấy thịt và các topping bên trong hộp rõ ràng và mới. Có 3 vị: Thịt cá ngừ & bí đỏ, Thịt gà & tôm, Thịt cá ngừ & tôm.', 'hức ăn có chất lượng cao với hàm lượng protein phù hợp cho mèo có đủ dinh dưỡng để hoạt động trong 1 ngày.  Hoàn toàn an toàn với những sản phẩm hữu cơ bao gồm cá ngừ hay thị gà, đảm bảo không làm cho mèo của bạn bị dị ứng sau khi ăn.', '127.jpg', 20);
INSERT INTO `products` VALUES (127, 'Pate Cải Thiện Da Và Lông Cho Mèo Royal Canin Intense Beauty Jelly', 35000, 'Thành phần chứa axit béo omega 3 và 6 hỗ trợ làn da khỏe mạnh và bộ lông sáng bóng đẹp mắt. Sản phẩm có hàm lượng protein cao giúp duy trì trọng lượng cơ thể khỏe mạnh.', 'Royal Canin Intense Beauty được thiết kế đặc biệt để thúc đẩy vẻ đẹp và sức sống cho các bé mèo. Hàm lượng phốt pho vừa đủ nhằm bảo vệ sức khỏe thận.  Pate mềm dễ ăn kết hợp cùng thạch kích thích vị giác.', '128.jpg', 20);
INSERT INTO `products` VALUES (128, 'Cát Đất Sét Kitty Max 10L – Hút Mạnh, Tiết Kiệm Cát', 175000, 'Cát có rất nhiều loại nhưng phổ biến nhất vẫn là cát đất sét. Cát đất sét là loại cát gia công được làm thành phần chính là đất sét, các viên khử mùi và một số chất giúp tăng độ thấm hút khi gặp nước. Nguyên liệu cát được sử dụng từ 100% cát bentonite trắ', 'Cát đất sét  có khả năng thấm hút và khử mùi tốt, từ đó giúp bạn tiết kiệm thời gian dọn dẹp khay vệ sinh cho mèo hơn. Bạn có thể 1 tuần dọn 3 đến 4 lần thay vì phải dọn chất thải của mèo hằng ngày.  Giúp tăng cường khả năng thấm hút khi cát hạt cát được ', '129.png', 21);
INSERT INTO `products` VALUES (129, 'Viên Khử Mùi Cát Vệ Sinh Mèo Cature 450ml – Hương Biển', 120000, 'Công thức đặc biệt giúp tiêu diệt toàn bộ những vi khuẩn gây mùi từ chất thải của mèo. Viên khử mùi có thể sử dụng trên bất kì loại cát vệ sinh nào cho mèo. Cách sử dụng đơn giản, bạn chỉ cần đổ vài viên khử mùi lên trên bề mặt cát.', 'Viên có mùi hương biển tươi mắt, mang lại cảm giác tràn đầy sức sống cho không gian sinh hoạt. Viên khử mùi giúp làm sạch cát vệ sinh mèo, loại bỏ hoàn toàn mùi hôi từ chất thải của mèo. Đã được thử nghiệm và chứng minh, viên cát vệ sinh có chứa các chất ', '130.png', 21);
INSERT INTO `products` VALUES (130, 'Cát Vệ Sinh Hương Quýt Vani Sanicat Bentonite (10l)', 205000, 'Xuất xứ thương hiệu Tây Ban Nha,  Không bụi, có hương thơm và sử dụng lâu dài, 100% chất liệu Bentonite trắng tự nhiên giúp cát có khả năng vón cục tốt', 'Kiểm soát vi khuẩn và khử mùi tốt, Không vương vãi, gây bụi bẩn trên nền nhà', '131.jpg', 21);
INSERT INTO `products` VALUES (131, 'Cát Thuỷ Tinh Hương Lô Hội Sanicat Silica Gel (15l)', 411000, 'Xuất xứ thương hiệu Tây Ban Nha. Không bụi, có hương thơm và sử dụng lâu dài. Áp dụng công nghệ cái tiến mới giúp tăng độ kết dính của cát khi gặp chất thải,  Thời gian sử dụng từ 1 tháng trở lên cho 1 chú m', 'Cát thủy tinh không bám vào móng hoặc các kẽ chân, giúp mèo thoải mái. Không vương vãi, gây bụi bẩn trên nền nhà', '132.jpg', 21);
INSERT INTO `products` VALUES (132, 'Cát Thuỷ Tinh Vón Cục Hương Hoa Sanicat Silica Gel (5l)', 183000, 'Xuất xứ thương hiệu Tây Ban Nha. Không bụi, có hương thơm và sử dụng lâu dài. Áp dụng công nghệ cái tiến mới giúp tăng độ kết dính của cát khi gặp chất thải,  Thời gian sử dụng từ 1 tháng trở lên cho 1 chú m', 'Cát thủy tinh không bám vào móng hoặc các kẽ chân, giúp mèo thoải mái. Không vương vãi, gây bụi bẩn trên nền nhà', '133.jpg', 21);
INSERT INTO `products` VALUES (133, 'Cát Vệ Sinh Noba Science Không Mùi 12kg – Siêu Thấm Hút', 400000, 'Men Probiotics trong cát không những giúp khử sạch mùi mà còn làm vón cục chất thải trong thời gian nhanh nhất. Một túi cát 12kg có thời gian sử dụng lên đến 3 tháng. Sản phẩm có chứa các loại men vi sinh probiotics giúp khử sạch mùi hôi chất thải của mèo', 'Cát được sản xuất theo công nghệ độc quyền của Noba, giúp thấm hút chất thải cực kì tốt, nhưng lại không tốn quá nhiều cát, giúp tiết kiệm cát hơn. Sản phẩm không gây bụi, nên không ảnh hưởng tới chất lượng sống của mèo và người nuôi.', '134.png', 21);
INSERT INTO `products` VALUES (134, 'Cát Vệ Sinh Mèo Cat’s Choice 7.5kg – Hạt Mịn, Khử Mùi Mạnh', 130000, 'Cát mịn giúp cho việc thấm hút chất thải trở nên dễ dàng hơn, đồng thời giúp bạn sử dụng tiết kiệm cát hơn các loại cát vệ sinh cho mèo hạt to.', 'Bạn sẽ không cần phải đổ hết thau cát vì chất thải mèo lem nhem nữa vì Cat\'s Choice có kết cấu đặc biệt giúp cho việc hút nén chất thải hiệu quả, bạn chỉ cần lấy xẻng xúc bỏ đi và lại tiếp tục cho mèo sử dụng. Như thế sẽ tiết kiệm hơn rất nhiều so với các', '135.png', 21);

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
INSERT INTO `products_type` VALUES (1, 'Thức ăn cho chó', 1);
INSERT INTO `products_type` VALUES (2, 'Sữa tắm cho chó', 1);
INSERT INTO `products_type` VALUES (3, 'Phụ kiện cho chó', 1);
INSERT INTO `products_type` VALUES (4, 'Thực phẩm chức năng cho chó', 1);
INSERT INTO `products_type` VALUES (5, 'Đồ chơi cho chó', 1);
INSERT INTO `products_type` VALUES (6, 'Chuồng, nệm cho chó', 1);
INSERT INTO `products_type` VALUES (7, 'Balo cho chó', 1);
INSERT INTO `products_type` VALUES (8, 'Vật dụng ăn uống cho chó', 1);
INSERT INTO `products_type` VALUES (9, 'Quần áo cho chó', 1);
INSERT INTO `products_type` VALUES (10, 'Pate các loại cho chó', 1);
INSERT INTO `products_type` VALUES (11, 'Thức ăn cho mèo', 2);
INSERT INTO `products_type` VALUES (12, 'Sữa tắm cho mèo', 2);
INSERT INTO `products_type` VALUES (13, 'Phụ kiện cho mèo', 2);
INSERT INTO `products_type` VALUES (14, 'Thực phẩm chức năng cho mèo', 2);
INSERT INTO `products_type` VALUES (15, 'Đồ chơi cho mèo', 2);
INSERT INTO `products_type` VALUES (16, 'Chuồng cho mèo', 2);
INSERT INTO `products_type` VALUES (17, 'Balo cho mèo', 2);
INSERT INTO `products_type` VALUES (18, 'Vật dụng ăn uống cho mèo', 2);
INSERT INTO `products_type` VALUES (19, 'Quần áo cho mèo', 2);
INSERT INTO `products_type` VALUES (20, 'Pate cho mèo', 2);
INSERT INTO `products_type` VALUES (21, 'Cát mèo', 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Quản trị viên', '0000000000', '0000000000', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'admin', 0, NULL);
INSERT INTO `users` VALUES (2, 'Nguyễn Tùng Lâm', '0338309523', '124 đường Mạc Thiên Tích, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'lam@gmail.com', 1, 'xuan.jpg');
INSERT INTO `users` VALUES (3, 'Nguyễn Hoàng Thông', '0358309329', '12 đường Lý Tự Trọng, phường An Lạc, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'thong@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (4, 'Hầu Diễm Xuân', '0123763585', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'xuan@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (5, 'Phạm Chí Trung', '0925385162', '82 đường Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'trung@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (6, 'Đoàn Duy Thanh', '0873174284', '97 đường Hùng Vương, phường An Cư, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'thanh@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (7, 'Nguyễn Huỳnh Hoàng Phúc', '0836109481', '48 đường Trần Ngọc Quế, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'phuc@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (8, 'Trần Văn Thiệt', '0927385387', '178 đường Nguyễn Việt Hồng, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'thiet@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (9, 'Nguyễn Thị Thúy Lựu', '0391278359', '132 đường Mậu Thân, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'luu@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (10, 'Trịnh Kim Chi', '0331489511', '228 đường Nguyễn Trãi, phường Cái Khế, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'chi@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (11, 'Trần Phương Thảo', '0702137273', '312 đường Nguyễn Văn Linh, phường Hưng Lợi, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$tMMXcJbTjR70cbC5pW6hGu3QvNPNwOd2YXz09UHrd107aqPDe1uMm', 'thao@gmail.com', 1, NULL);
INSERT INTO `users` VALUES (15, 'haudiemxuan', '0120589414', '45 đường Trần Hưng Đạo, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', '$2y$10$cKS1ZrCkJVLLsC/.SbByuOyL7aFPEfjyQyu.Wp49r.X4BLnRdz6yi', 'diemxuan@gmail.com', 1, 'xuan.jpg');
INSERT INTO `users` VALUES (18, '', '', NULL, '', NULL, 0, NULL);

SET FOREIGN_KEY_CHECKS = 1;
