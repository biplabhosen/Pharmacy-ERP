<?php
class Medicine extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $generic_name;
	public $img;
	public $category_id;
	public $manufacturer_id;
	public $strength;
	public $unit;
	public $batch_number;
	public $expiry_date;
	public $purchase_price;
	public $selling_price;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$generic_name,$img,$category_id,$manufacturer_id,$strength,$unit,$batch_number,$expiry_date,$purchase_price,$selling_price,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->generic_name=$generic_name;
		$this->img=$img;
		$this->category_id=$category_id;
		$this->manufacturer_id=$manufacturer_id;
		$this->strength=$strength;
		$this->unit=$unit;
		$this->batch_number=$batch_number;
		$this->expiry_date=$expiry_date;
		$this->purchase_price=$purchase_price;
		$this->selling_price=$selling_price;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}medicines(name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at)values('$this->name','$this->generic_name','$this->img','$this->category_id','$this->manufacturer_id','$this->strength','$this->unit','$this->batch_number','$this->expiry_date','$this->purchase_price','$this->selling_price','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}medicines set name='$this->name',generic_name='$this->generic_name',img='$this->img',category_id='$this->category_id',manufacturer_id='$this->manufacturer_id',strength='$this->strength',unit='$this->unit',batch_number='$this->batch_number',expiry_date='$this->expiry_date',purchase_price='$this->purchase_price',selling_price='$this->selling_price',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}medicines where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines");
		$data=[];
		while($medicine=$result->fetch_object()){
			$data[]=$medicine;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines $criteria limit $top,$perpage");
		$data=[];
		while($medicine=$result->fetch_object()){
			$data[]=$medicine;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}medicines $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines where id='$id'");
		$medicine=$result->fetch_object();
			return $medicine;
	}

	public static function findBystrength($id){
		global $db,$tx;
		$result =$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines where id='$id'");
		$medicine=$result->fetch_object();
			return $medicine;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}medicines");
		$medicine =$result->fetch_object();
		return $medicine->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Generic Name:$this->generic_name<br> 
		Img:$this->img<br> 
		Category Id:$this->category_id<br> 
		Manufacturer Id:$this->manufacturer_id<br> 
		Strength:$this->strength<br> 
		Unit:$this->unit<br> 
		Batch Number:$this->batch_number<br> 
		Expiry Date:$this->expiry_date<br> 
		Purchase Price:$this->purchase_price<br> 
		Selling Price:$this->selling_price<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	// static function html_select($name="cmbMedicine"){
	// 	global $db,$tx;
	// 	$html="<select class='form-select' id='$name' name='$name'> ";
	// 	$result =$db->query("select id, name, strength from {$tx}medicines");
	// 	while($medicine=$result->fetch_object()){
	// 		$html.="<option data-strength='$medicine->strength' value ='$medicine->id'>$medicine->name</option>";
	// 	}
	// 	$html.="</select>";
	// 	return $html;
	// }

	static function html_select($name="cmbMedicine"){
		global $db,$tx;
		$html="<select class='form-select' id='$name' name='$name'> ";
		$result =$db->query("select id, concat(name, ' ', strength) as name,selling_price from {$tx}medicines");
		while($medicine=$result->fetch_object()){
			$html.="<option data-price='$medicine->selling_price' value ='$medicine->id'>$medicine->name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function html_selectst($strength="cmbMedicine"){
		global $db,$tx;
		$html="<select class='form-select' id='$strength' name='$strength'> ";
		$result =$db->query("select id,strength from {$tx}medicines");
		while($medicine=$result->fetch_object()){
			$html.="<option value ='$medicine->id'>$medicine->strength</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}medicines $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"medicine/create","text"=>"New Medicine"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Generic Name</th><th>Img</th><th>Category Id</th><th>Manufacturer Id</th><th>Strength</th><th>Unit</th><th>Batch Number</th><th>Expiry Date</th><th>Purchase Price</th><th>Selling Price</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Generic Name</th><th>Img</th><th>Category Id</th><th>Manufacturer Id</th><th>Strength</th><th>Unit</th><th>Batch Number</th><th>Expiry Date</th><th>Purchase Price</th><th>Selling Price</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($medicine=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"medicine/show/$medicine->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"medicine/edit/$medicine->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"medicine/confirm/$medicine->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$medicine->id</td><td>$medicine->name</td><td>$medicine->generic_name</td><td>$medicine->img</td><td>$medicine->category_id</td><td>$medicine->manufacturer_id</td><td>$medicine->strength</td><td>$medicine->unit</td><td>$medicine->batch_number</td><td>$medicine->expiry_date</td><td>$medicine->purchase_price</td><td>$medicine->selling_price</td><td>$medicine->created_at</td><td>$medicine->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,generic_name,img,category_id,manufacturer_id,strength,unit,batch_number,expiry_date,purchase_price,selling_price,created_at,updated_at from {$tx}medicines where id={$id}");
		$medicine=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Medicine Show</th></tr>";
		$html.="<tr><th>Id</th><td>$medicine->id</td></tr>";
		$html.="<tr><th>Name</th><td>$medicine->name</td></tr>";
		$html.="<tr><th>Generic Name</th><td>$medicine->generic_name</td></tr>";
		$html.="<tr><th>Img</th><td>$medicine->img</td></tr>";
		$html.="<tr><th>Category Id</th><td>$medicine->category_id</td></tr>";
		$html.="<tr><th>Manufacturer Id</th><td>$medicine->manufacturer_id</td></tr>";
		$html.="<tr><th>Strength</th><td>$medicine->strength</td></tr>";
		$html.="<tr><th>Unit</th><td>$medicine->unit</td></tr>";
		$html.="<tr><th>Batch Number</th><td>$medicine->batch_number</td></tr>";
		$html.="<tr><th>Expiry Date</th><td>$medicine->expiry_date</td></tr>";
		$html.="<tr><th>Purchase Price</th><td>$medicine->purchase_price</td></tr>";
		$html.="<tr><th>Selling Price</th><td>$medicine->selling_price</td></tr>";
		$html.="<tr><th>Created At</th><td>$medicine->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$medicine->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
