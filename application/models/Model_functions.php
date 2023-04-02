<?php
class Model_functions extends CI_Model {

	public function get_results($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			return $res->result_array();
		}
		else
		{
			return false;
		}
	}
	public function get_row($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			$resp = $res->result_array();
			return $resp[0];
		}
		else
		{
			return false;
		}
	}
	
	public function login($username, $password, $check = FALSE)
	{
		$password = md5($password);
		return $this->get_row("SELECT * FROM `customer` WHERE `phone` = '$username' AND `password` = '$password';");
	}
	public function login2($phone)
	{
		return $this->get_row("SELECT `customer_id`,`phone` FROM `customer` WHERE `phone` = '$phone';");
	}
	public function login_social($id)
	{
		return $this->get_row("SELECT * FROM `customer` WHERE `fb_id` = '$id';");
	}
	public function seller_login($mobile,$password)
	{
		return $this->get_row("SELECT * FROM `seller` WHERE `password` = '$password' AND (`mobile` = '$mobile' OR `email` = '$mobile');");
	}

	public function sms_setting()
	{
		return $this->get_row("SELECT * FROM `sms_setting` WHERE `sms_setting_id` = '1';");
	}

	/* Categories */
	public function get_parents()
	{
		return $this->get_results("SELECT `id`,`title`,`parent`,`image`,`main_menu`,`main_right_menu`,`main_home_page`,`slug` FROM `categories` WHERE `status` = 1 AND `parent` = '0' ORDER BY `id` ASC;");
	}
	public function get_main_menu()
	{
		return $this->get_results("SELECT `id`,`title`,`main_menu` FROM `categories` WHERE `status` = 1 AND `main_menu` = 'yes' ORDER BY `id` ASC;");
	}
	public function get_cats()
	{
		return $this->get_results("SELECT `id`,`title`,`parent`,`image`,`main_menu`,`main_right_menu`,`main_home_page`,`main_home_page_under_parent`,`slug` FROM `categories` WHERE `status` = 1 ORDER BY `id` ASC;");
	}
	public function get_all_cats()
	{
		return $this->get_results("SELECT * FROM `categories` ORDER BY `id` ASC;");
	}
	public function get_child_cats($parent)
	{
		return $this->get_results("SELECT `id`,`title`,`parent`,`image`,`main_menu`,`main_right_menu`,`main_home_page`,`main_home_page_under_parent`,`slug` FROM `categories` WHERE `parent` = '$parent' AND `status` = 1 ORDER BY `id` ASC;");
	}
	public function get_cat_byid($id)
	{
		return $this->get_row("
			SELECT c.*, COUNT(p.product_id) AS Items 
			FROM `categories` AS c 
			LEFT JOIN `products` AS p ON c.id = p.category_id 
			WHERE c.id = '$id' AND c.status = 1
		;");
	}
	public function get_cat_byslug($slug)
	{
		return $this->get_row("
			SELECT c.*, COUNT(p.product_id) AS Items 
			FROM `categories` AS c 
			LEFT JOIN `products` AS p ON c.id = p.category_id 
			WHERE c.slug = '$slug' AND c.status = 1
		;");
	}
	public function get_cat_product_count($cat)
	{
		return $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `category_id` = '$cat';");
	}
	/* Products & Listing */
	public function get_deal_products($ids)
	{
		$totalLimit = $this->get_row("SELECT * FROM `deal` WHERE NOW() >= `start` AND NOW() <= `end` ORDER BY `deal_id` ASC;");
		$totalLimit = explode(',', $totalLimit['products']);
		$totalLimit = count($totalLimit);
		$limit = 1;
		$pages = ceil($totalLimit / $limit);
		$offset = (0) * $limit;
		$OFFSET = 'LIMIT '.$limit.' OFFSET '.$offset.' ';
		return $this->get_results("
			SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,p.size,p.color,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.product_id IN ($ids) AND p.in_stock = 1 
			ORDER BY p.price ASC 
			$OFFSET
		;");
	}
	public function get_deal_cats_filter_id($ids)
	{
		return $this->get_results("
			SELECT DISTINCT(c.filter_ids) AS filter_ids 
			FROM `products` AS p 
			LEFT JOIN `categories` AS c ON p.category_id = c.id 
			WHERE p.product_id IN ($ids) AND p.in_stock = 1 AND c.filter_ids != '' 
			ORDER BY p.price ASC
		;");
	}
	public function get_deal_cats($ids)
	{
		return $this->get_results("
			SELECT DISTINCT(p.category_id) AS id, c.title 
			FROM `products` AS p 
			LEFT JOIN `categories` AS c ON p.category_id = c.id 
			WHERE p.product_id IN ($ids) AND p.in_stock = 1 
			ORDER BY c.title ASC
		;");
	}
	public function get_deal_brands($ids)
	{
		return $this->get_results("
			SELECT DISTINCT(p.brand_id) AS brand_id, b.title 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.product_id IN ($ids) AND p.in_stock = 1 
			ORDER BY b.title ASC
		;");
	}
	public function get_products($cat)
	{
		return $this->get_results("
			SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,p.size,p.color,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.category_id = '$cat' AND p.in_stock = 1 
			ORDER BY p.product_id DESC
		;");
	}
	public function get_products_by_brand_cat($cat,$brand,$limit = false)
	{
		if ($limit) {
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.category_id = '$cat' AND p.brand_id = '$brand' AND p.in_stock = 1 
				ORDER BY p.product_id DESC LIMIT $limit
			;");
		}
		else{
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.category_id = '$cat' AND p.brand_id = '$brand' AND p.in_stock = 1 
				ORDER BY p.product_id DESC
			;");
		}
	}
	public function get_products_by_brand_cat_listing($cat,$brand,$list,$limit = false)
	{
		if ($limit) {
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.category_id = '$cat' AND p.brand_id = '$brand' AND p.seller_listing_id = '$list' AND p.in_stock = 1 
				ORDER BY p.product_id DESC LIMIT $limit
			;");
		}
		else{
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.category_id = '$cat' AND p.brand_id = '$brand' AND p.seller_listing_id = '$list' AND p.in_stock = 1 
				ORDER BY p.product_id DESC
			;");
		}
	}
	public function get_cats_ids_by_brand($id)
	{
		return $this->get_results("
			SELECT DISTINCT(p.category_id) AS cat_id 
			FROM `products` AS p 
			WHERE p.brand_id = '$id' AND p.in_stock = 1 
			ORDER BY p.product_id DESC
		;");
	}
	public function get_cats_ids_by_brand_listing($id,$list)
	{
		return $this->get_results("
			SELECT DISTINCT(p.category_id) AS cat_id 
			FROM `products` AS p 
			WHERE p.brand_id = '$id' AND p.seller_listing_id = '$list' AND p.in_stock = 1 
			ORDER BY p.product_id DESC
		;");
	}
	public function get_product_categories($brand)
	{
		return $this->get_results("
			SELECT DISTINCT(p.category_id) AS id, c.title 
			FROM `products` AS p 
			INNER JOIN `categories` AS c ON c.id = p.category_id 
			WHERE p.brand_id = '$brand'
			ORDER BY c.title ASC
		;");
	}
	public function get_products_by_brand($brand, $in_stock = 1)
	{
		if ($in_stock == 'all') {
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.sku,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,p.in_stock,b.image AS BrandImage, p.sale_percentage, p.seller_listing_id, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.brand_id = '$brand' 
				ORDER BY p.price ASC
			;");
		}
		else{
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.sku,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,p.in_stock,b.image AS BrandImage, p.sale_percentage, p.seller_listing_id, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.brand_id = '$brand' AND p.in_stock = '$in_stock' 
				ORDER BY p.price ASC
			;");
		}
	}
	public function get_products_by_list($list, $in_stock = 1)
	{
		if ($in_stock == 'all') {
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.sku,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,p.in_stock,b.image AS BrandImage, p.sale_percentage, p.seller_listing_id, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.seller_listing_id = '$list' 
				ORDER BY p.price ASC
			;");
		}
		else{
			return $this->get_results("
				SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.sku,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,p.in_stock,b.image AS BrandImage, p.sale_percentage, p.seller_listing_id, p.category_id 
				FROM `products` AS p 
				LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
				WHERE p.seller_listing_id = '$list' AND p.in_stock = '$in_stock' 
				ORDER BY p.price ASC
			;");
		}
	}
	public function get_products_seller_products_by_catid($brand,$cat)
	{
		return $this->get_results("
			SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.sku,p.new,p.reviews,p.ratting,p.color,p.size,p.slug,b.image AS BrandImage, p.sale_percentage, p.category_id 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.brand_id = '$brand' AND p.category_id = '$cat' AND p.in_stock = 1 
			ORDER BY p.price ASC
		;");
	}
	public function get_seller_products_count($brand)
	{
		$final['live'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `in_stock` = '1';");
		$final['inactive'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `in_stock` = '0';");
		$final['sold'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `in_stock` = '2';");
		$final['policy_voilation'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `policy_voilation` = 'yes';");
		$final['poor'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `reviews` > 0 AND `ratting` <= 2;");
		return $final;
	}
	public function get_seller_category_products_count($brand,$cat)
	{
		$final['live'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `category_id` = '$cat' AND `in_stock` = '1';");
		$final['inactive'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `category_id` = '$cat' AND `in_stock` = '0';");
		$final['sold'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `category_id` = '$cat' AND `in_stock` = '2';");
		$final['policy_voilation'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `brand_id` = '$brand' AND `category_id` = '$cat' AND `policy_voilation` = 'yes';");
		$final['poor'] = $this->get_row("SELECT COUNT(`product_id`) AS count FROM `products` WHERE `reviews` > 0 AND `ratting` <= 2 AND `category_id` = '$cat';");
		return $final;
	}
	public function get_products_by_keyword($key)
	{
		return $this->get_results("
			SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,p.color,p.size,b.image AS BrandImage, p.sale_percentage, p.category_id 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.product_name LIKE '%$key%' AND p.in_stock = 1 
			ORDER BY p.price ASC
		;");
	}
	public function get_listting_filtters($filters)
	{
		$sort = $filters['sort'];
		if (strlen($sort)) {
			$order = "ORDER BY p.price $sort ";
		}
		else{
			$order = "ORDER BY p.product_id DESC ";
		}
		$OFFSET = '';
		$where = '1=1 ';
		if ($filters['listing_type'] == 'deal') {
			if ($filters['CatID'] != 'false') {
				$where .= "AND p.category_id IN (".$filters['CatID'].") ";
			}
			if ($filters['product_ids'] != 0) {
				$where .= "AND p.product_id IN (".$filters['product_ids'].") ";
			}
			$totalLimit = $this->get_row("SELECT * FROM `deal` WHERE NOW() >= `start` AND NOW() <= `end` ORDER BY `deal_id` ASC;");
			$totalLimit = explode(',', $totalLimit['products']);
			$totalLimit = count($totalLimit);
			$limit = 1;
			$pages = ceil($totalLimit / $limit);
			$offset = ($filters['page'] - 1)  * $limit;
			$OFFSET = 'LIMIT '.$limit.' offset '.$offset.' ';
		}
		else{
			if ($filters['CatID'] > 0) {
				$where .= "AND p.category_id = ".$filters['CatID']." ";
			}
		}
		if ($filters['min_price'] > 0) {
			$where .= "AND p.price >= '".$filters['min_price']."' ";
		}
		if ($filters['max_price'] > 0) {
			$where .= "AND p.price <= '".$filters['max_price']."' ";
		}
		if ($filters['BrandID'] > 0) {
			$where .= " AND p.brand_id IN (".$filters['BrandID'].") ";
		}
		$sizeID = explode(',', $filters['SizeID']);
		if ($sizeID[0] != 'false') {
			$where .= 'AND (';
			for ($i=0; $i < count($sizeID); $i++) {
				if ($sizeID[$i] > 0) {
					if ($i == 0) {
						$where .= " find_in_set('".$sizeID[$i]."',p.size) ";
					}
					else{
						$where .= " OR find_in_set('".$sizeID[$i]."',p.size) ";
					}
				}
			}
			$where .= ') ';
		}
		$colorID = explode(',', $filters['ColorID']);
		if ($colorID[0] != 0) {
			$where .= 'AND (';
			for ($i=0; $i < count($colorID); $i++) { 
				if ($i == 0) {
					$where .= " find_in_set('".$colorID[$i]."',p.color) ";
				}
				else{
					$where .= " OR find_in_set('".$colorID[$i]."',p.color) ";
				}
			}
			$where .= ')';
		}
		if (isset($filters['DynamicFilterID']) && strlen($filters['DynamicFilterID']) > 0 && $filters['DynamicFilterID'] != 'false') {
			$DynamicFilterID = explode(',', $filters['DynamicFilterID']);
			$where .= 'AND (';
			foreach ($DynamicFilterID as $keyFID => $FilterID) {
				if ($keyFID == 0) {
					$where .= "find_in_set('".$FilterID."',p.dynamic_filters) ";
				}
				else{
					$where .= "OR find_in_set('".$FilterID."',p.dynamic_filters) ";
				}
			}
			$where .= ')';
		}
		if ($filters['search'] == 'true' && $filters['search_type'] == 'product') {
			$where .= " AND p.product_name LIKE '%".$filters['search_key']."%'";
		}
		if ($filters['search'] == 'true' && $filters['search_type'] == 'direct') {
			$where .= " AND p.product_name LIKE '%".$filters['search_key']."%'";
		}
		$resp['products'] = $this->get_results("
			SELECT p.product_id,p.category_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,p.color_images,b.image AS BrandImage, p.sale_percentage, p.dynamic_filters 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE $where AND p.in_stock = 1 
			$order 
			$OFFSET;
		");
		$count = $this->get_row("
			SELECT COUNT(p.product_id) AS count 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE $where AND p.in_stock = 1 
			$order;
		");
		if ($filters['page_click'] == 'false') {
			$resp['pages'] = $count['count']/1;
		}
		else{
			$resp['pages'] = false;
		}
		return $resp;
	}
	public function get_product_detail_byid($id)
	{
		$product = $this->get_row("
			SELECT p.*, b.title AS Brand,b.slug AS BrandSlug, c.title AS Category, c.filters 
			FROM `products` AS p 
			INNER JOIN `categories` AS c ON c.id = p.category_id 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.product_id = '$id' AND p.in_stock = 1
		;");
		if ($product) {
			$tags = $this->get_results("
				SELECT pt.value, ct.name 
				FROM `product_tag` AS pt 
				INNER JOIN `cat_tag` AS ct ON pt.cat_tag_id = ct.cat_tag_id 
				WHERE pt.product_id = $id AND ct.status = 'active' 
				ORDER BY ct.name ASC
			;");
			$final['product'] = $product;
			$final['tags'] = $tags;
			return $final;
		}
		else{
			return false;
		}
	}
	public function get_product_byid($id)
	{
		return $this->get_row("SELECT * FROM `products` WHERE `product_id` = '$id';");
	}
	public function get_product_byid_loop($id)
	{
		return $this->get_results("SELECT * FROM `products` WHERE `product_id` = '$id';");
	}
	public function get_product_images($id)
	{
		return $this->get_results("SELECT * FROM `product_image` WHERE `product_id` = '$id' ORDER BY `product_image_id` ASC;");
	}
	public function get_related_products($pro,$cat)
	{
		return $this->get_results("SELECT `product_id`,`product_name`,`product_image`,`price`,`discount`,`new`,`reviews`,`ratting`,`slug`,`sale_percentage`,`category_id` FROM `products` WHERE `product_id` != '$pro' AND `category_id` = '$cat' AND `in_stock` = 1 ORDER BY `product_id` DESC LIMIT 8;");
	}
	public function get_featured_products()
	{
		return $this->get_results("
			SELECT p.product_id,p.product_name,p.product_image,p.price,p.discount,p.new,p.reviews,p.ratting,p.slug,b.image AS BrandImage, p.sale_percentage, p.category_id 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.featured = 'yes' AND p.in_stock = 1 
			ORDER BY p.price ASC 
			LIMIT 8
		;");
	}
	public function get_product_for_ratting($pro,$user)
	{
		return $this->get_row("
			SELECT s.status, s.sale_id, si.product_id, si.sale_item_id 
			FROM `sale` AS s 
			INNER JOIN `sale_items` AS si ON s.sale_id = si.sale_id 
			WHERE s.status = 4 AND s.user_id = '$user' AND si.product_id = '$pro'
		;");
	}
	public function review($pro,$count,$page)
	{
		$limit = 10;
		$total_posts = $count;
		$pages = ceil($total_posts / $limit);
		$offset = ($page - 1) * $limit;
		return $this->get_results("
			SELECT r.*, c.fname, c.lname 
			FROM `review` AS r 
			INNER JOIN `customer` AS c ON r.user_id = c.customer_id 
			WHERE r.product_id = '$pro' AND r.status = 'active' 
			ORDER BY r.at DESC 
			LIMIT $offset, $limit
		;");
	}
	public function brands_listing_page($cat)
	{
		return $this->get_results("
			SELECT DISTINCT(p.brand_id) AS brand_id, b.title 
			FROM `products` AS p 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE p.category_id = $cat AND p.in_stock = 1 
			ORDER BY b.title ASC
		;");
	}
	public function get_related_brands($brand)
	{
		$brand = $this->get_row("SELECT `categories` FROM `brand` WHERE `brand_id` = '$brand';");
		if (strlen($brand['categories']) > 0) {
			$categories = explode(',', $brand['categories']);
			$where = '1=1 ';
			foreach ($categories as $key => $cat) {
				$where .= "AND find_in_set('".$cat."', b.categories ) ";
			}
			return $this->get_results("
				SELECT DISTINCT(b.brand_id) AS brand_id, b.title 
				FROM `brand` AS b 
				WHERE $where 
				ORDER BY b.title ASC
			;");
		}
		else{
			return false;
		}
	}
	// CART
	public function checkout_products($cart)
	{
		if ($cart) {
			foreach ($cart as $key => $q) {
				$id = $q['id'];
				$pro = $this->get_product_detail_byid($id);
				$final[$key]['product'] = $pro['product'];
				$final[$key]['cart'] = $q;
			}
			return $final;
		}
		else{
			return false;
		}
	}
	public function get_socities()
	{
		return $this->get_results("SELECT * FROM `socity` ORDER BY `socity_name` ASC;");
	}
	public function get_cities()
	{
		return $this->get_results("SELECT * FROM `city` ORDER BY `name` ASC;");
	}	
	public function delivery_charges()
	{
		$resp = $this->get_row("SELECT `value` FROM `settings` WHERE `id` = 2;");
		return $resp['value'];
	}
	public function delivery_charges_waive_off_limit()
	{
		$resp = $this->get_row("SELECT `value` FROM `settings` WHERE `id` = 3;");
		return $resp['value'];
	}
	public function get_last_delivery_information_by_customer($id)
	{
		return $this->get_row("SELECT * FROM `user_location` WHERE `user_id` = '$id' ORDER BY `location_id` DESC;");
	}
	public function user_locations($id)
	{
		return $this->get_results("
			SELECT DISTINCT ul.house_no,ul.receiver_name,ul.receiver_mobile,ul.pincode, s.socity_name AS Socity, c.name AS City 
			FROM `user_location` AS ul 
			LEFT JOIN `socity` AS s ON ul.socity_id = s.socity_id 
			LEFT JOIN `city` AS c ON ul.city_id = c.city_id 
			WHERE ul.user_id = '$id' 
			ORDER BY ul.location_id DESC
		;");
	}
	public function get_coupon($code)
	{
		return $this->get_row("SELECT * FROM `coupons` WHERE `coupon_code` = '$code';");
	}

	public function get_settings()
	{
		return $this->get_results("SELECT * FROM `settings` ORDER BY `id` ASC;");
	}
	public function get_setting_byid($id)
	{
		return $this->get_row("SELECT * FROM `settings` WHERE `id` = '$id';");
	}
	public function get_email_cron_setting()
	{
		return $this->get_row("SELECT `value` FROM `settings` WHERE `title` =  'email_cron';");
	}
	public function get_page($id)
	{
		return $this->get_row("SELECT * FROM `pageapp` WHERE `id` = '$id';");
	}
	public function testimonials()
	{
		return $this->get_results("SELECT * FROM `testimonial` WHERE `status` = 'active' ORDER BY `testimonial_id` DESC;");
	}
	public function user_orders($user)
	{
		return $this->get_results("SELECT * FROM `sale` WHERE `user_id` = '$user' ORDER BY `sale_id` DESC;");
	}
	public function get_vouchers_orders($user)
	{
		return $this->get_results("SELECT * FROM `sale` WHERE `user_id` = '$user' AND `discount_code` != '' AND `discount` > 0 ORDER BY `sale_id` DESC;");
	}
	public function wishlist($user)
	{
		return $this->get_results("
			SELECT w.wishlist_id, p.product_image AS image, p.product_name AS Product, p.price, p.discount, p.sale_percentage, p.product_id, p.slug, p.category_id, b.title AS Brand 
			FROM `wishlist` AS w 
			INNER JOIN `products` AS p ON w.product_id = p.product_id 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE w.user_id = '$user' 
			ORDER BY w.wishlist_id DESC
		;");
	}
	public function get_user_purchesed_products_for_review($user)
	{
		return $this->get_results("
			SELECT DISTINCT(si.product_id) AS product_id, p.product_name AS Product, p.product_image AS image, p.category_id, b.title AS Brand, s.at, c.title AS Category, r.status AS ReviewStatus 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `categories` AS c ON p.category_id = c.id 
			LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
			LEFT JOIN `review` AS r ON p.product_id = r.product_id 
			WHERE s.user_id = '$user' AND s.status = '4' AND si.status = 'delivered' 
			GROUP BY si.product_id 
			ORDER BY s.at DESC 
		;");
	}

	public function blog()
	{
		return $this->get_results("SELECT * FROM `blog` WHERE `status` = 'active' ORDER BY `at` DESC;");
	}
	public function get_blog_by_slug($slug)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `slug` = '$slug' AND `status` = 'active';");
	}

	public function get_business_detail($seller)
	{
		return $this->get_row("SELECT * FROM `business_detail` WHERE `seller_id` = '$seller';");
	}
	public function get_warehouse($seller)
	{
		return $this->get_row("SELECT * FROM `warehouse` WHERE `seller_id` = '$seller';");
	}
	public function get_return_address($seller)
	{
		return $this->get_row("SELECT * FROM `return_address` WHERE `seller_id` = '$seller';");
	}
	/*
	*
	*
	*	@LOCATION
	*
	*
	*/
	public function countries()
	{
		return $this->get_results("SELECT * FROM `country` ORDER BY `name` ASC");
	}
	public function states($country)
	{
		return $this->get_results("SELECT * FROM `state` WHERE `country_id` = '$country' ORDER BY `name` ASC");
	}
	public function cities($state)
	{
		return $this->get_results("SELECT * FROM `city` WHERE `state_id` = '$state' ORDER BY `name` ASC");
	}

	public function get_orders_items_by_brand($brand)
	{
		return $this->get_results("
			SELECT si.*, b.brand_id, s.at, p.sku, s.payment_method, s.status AS OrderStatus 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' 
			ORDER BY s.at DESC
		;");
	}
	public function get_brand_orders_items_by_search($brand,$get)
	{
		$where = '';
		$url = BASEURL.'seller/download-order-search?download=true';
		if (isset($_GET['order_number']) && $_GET['order_number'] > 0) {
			$where .= 'AND si.sale_id = '.$_GET['order_number'].' ';
			$url .= '&order_number='.$_GET['order_number'];
		}
		if (isset($_GET['product_name']) && strlen($_GET['product_name']) > 1) {
			$where .= "AND si.product_name LIKE %'".$_GET['product_name']."'% ";
			$url .= '&product_name='.$_GET['product_name'];
		}
		if (isset($_GET['sku']) && strlen($_GET['sku']) > 0) {
			$where .= "AND p.sku = '".$_GET['sku']."' ";
			$url .= '&sku='.$_GET['sku'];
		}
		if (isset($_GET['qty']) && $_GET['qty'] > 0) {
			$where .= 'AND si.qty = '.$_GET['qty'].' ';
			$url .= '&qty='.$_GET['qty'];
		}
		if (isset($_GET['start_date']) && strlen($_GET['start_date']) > 1) {
			$where .= "AND s.at >= '".date('Y-m-d H:i:s',strtotime($_GET['start_date']))."' ";
			$url .= '&start_date='.$_GET['start_date'];
		}
		if (isset($_GET['end_date']) && strlen($_GET['end_date']) > 1) {
			$where .= "AND s.at <= '".date('Y-m-d H:i:s',strtotime($_GET['end_date']))."' ";
			$url .= '&end_date='.$_GET['end_date'];
		}
		if (isset($_GET['status']) && strlen($_GET['status']) > 1) {
			$where .= "AND si.status = '".$_GET['status']."' ";
			$url .= '&status='.$_GET['status'];
		}
		$resp['orders'] = $this->get_results("
			SELECT si.*, b.brand_id, s.at, p.sku, s.payment_method, s.status AS OrderStatus 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' $where
			ORDER BY s.at DESC
		;");
		if ($resp['orders']) {
			$resp['url'] = $url;
		}
		else{
			$resp['url'] = 'javascript://';
		}
		return $resp;
	}
	public function get_total_sale_by_brand($brand)
	{
		return $this->get_row("
			SELECT SUM(si.total) AS 'total', COUNT(si.sale_item_id) AS 'items' 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' 
			ORDER BY s.at ASC
		;");
	}
	public function get_pending_orders_bydays($brand)
	{
		$resp = $this->get_row("
			SELECT COUNT(si.sale_item_id) AS 'count' 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' AND s.at >= now() - INTERVAL 1 DAY AND si.status = 'pending' 
		;");
		$final['day_1'] = $resp['count'];
		$resp = $this->get_row("
			SELECT COUNT(si.sale_item_id) AS 'count' 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' AND s.at >= now() - INTERVAL 1 MONTH AND si.status = 'pending' 
		;");
		$final['month_1'] = $resp['count'];
		$resp = $this->get_row("
			SELECT COUNT(si.sale_item_id) AS 'count' 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' AND s.at >= now() - INTERVAL 6 MONTH AND si.status = 'pending' 
		;");
		$final['month_6'] = $resp['count'];
		$resp = $this->get_row("
			SELECT COUNT(si.sale_item_id) AS 'count' 
			FROM `sale_items` AS si 
			INNER JOIN `sale` AS s ON si.sale_id = s.sale_id 
			INNER JOIN `products` AS p ON si.product_id = p.product_id 
			INNER JOIN `brand` AS b ON p.brand_id = b.brand_id 
			WHERE b.brand_id = '$brand' AND s.at >= now() - INTERVAL 1 YEAR AND si.status = 'pending' 
		;");
		$final['year_1'] = $resp['count'];
		return $final;
	}
	public function user_addresses($user)
	{
		return $this->get_results("
			SELECT ud.*,c.name AS city, s.socity_name AS socity 
			FROM `user_address` AS ud 
			LEFT JOIN `city` AS c ON ud.city_id = c.city_id 
			LEFT JOIN `socity` AS s ON ud.socity_id = s.socity_id 
			WHERE ud.user_id = '$user' 
			ORDER BY ud.user_address_id DESC;");
	}
	public function user_address_byid($id)
	{
		return $this->get_row("SELECT * FROM `user_address` WHERE `user_address_id` = '$id';");
	}


	public function get_brand_byid($id)
	{
		return $this->get_row("SELECT * FROM `brand` WHERE `brand_id` = '$id';");
	}
	public function get_ads()
	{
		return $this->get_results("SELECT * FROM `ad` WHERE `status` = 'active' ORDER BY `ad_id` ASC;");
	}
	public function get_deals()
	{
		$deal = $this->get_row("SELECT * FROM `deal` WHERE NOW() >= `start` AND NOW() <= `end` ORDER BY `deal_id` ASC;");
		if ($deal) {
			$ids = $deal['products'];
			$products = $this->get_results("SELECT `product_id`,`category_id`,`product_name`,`slug`,`product_image`,`price`,`discount`,`sale_percentage`,`reviews`,`ratting` FROM `products` WHERE `product_id` IN ($ids) ORDER BY RAND() ASC LIMIT 12;");
			if ($products) {
				$final['deal'] = $deal;
				$final['products'] = $products;
				return $final;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function get_deals_by_brand($brand)
	{
		$deal = $this->get_row("SELECT * FROM `deal` WHERE NOW() >= `start` AND NOW() <= `end` ORDER BY `deal_id` ASC;");
		if ($deal) {
			$ids = $deal['products'];
			$products = $this->get_results("SELECT `product_id`,`category_id`,`product_name`,`slug`,`product_image`,`price`,`discount`,`sale_percentage`,`reviews`,`ratting` FROM `products` WHERE `product_id` IN ($ids) AND `brand_id` = '$brand' ORDER BY `price` ASC LIMIT 12;");
			if ($products) {
				$final['deal'] = $deal;
				$final['products'] = $products;
				return $final;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function get_location_byid($id)
	{
		return $this->get_row("
			SELECT ul.*,s.socity_name AS socity, c.city_name AS city 
			FROM `user_location` AS ul 
			LEFT JOIN `socity` AS s ON ul.socity_id = s.socity_id 
			LEFT JOIN `city` AS c ON ul.city_id = c.city_id 
			WHERE ul.location_id = '$id'
		");
	}
	public function get_sale_items($sale)
	{
		return $this->get_results("
			SELECT si.*, s.name AS SizeName, c.name AS ColorName 
			FROM `sale_items` AS si 
			LEFT JOIN `size` AS s ON s.size_id = si.size 
			LEFT JOIN `color` AS c ON c.color_id = si.color 
			WHERE si.sale_id = '$sale' 
			ORDER BY si.sale_item_id ASC 
		");
	}
	public function get_transfer_history($seller)
	{
		return $this->get_results("SELECT * FROM `transfer_history` WHERE `seller_id` = '$seller' ORDER BY `at` DESC;");
	}

	/*  CARDz */
	public function get_cards($user)
	{
		return $this->get_results("SELECT * FROM `card` WHERE `user_id` = '$user' ORDER BY `card_id`;");
	}
	public function get_card_byid($id)
	{
		return $this->get_row("SELECT * FROM `card` WHERE `card_id` = '$id';");
	}
	public function get_card($type)
	{
		return $this->get_row("SELECT * FROM `card` WHERE `type` = '$type';");
	}
	/* LISTING */
	public function get_lisitng($seller)
	{
		return $this->get_results("SELECT * FROM `seller_listing` WHERE `seller_id` = '$seller' ORDER BY `seller_listing_id` ASC;");
	}
	public function get_lisitng_byid($id,$seller)
	{
		return $this->get_row("SELECT * FROM `seller_listing` WHERE `seller_id` = '$seller' AND `seller_listing_id` = '$id';");
	}
}