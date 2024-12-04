<?php 
class Codes{
	public $db,$result;
	public function setConnect(){
		try{
			$this->db=new mysqli("localhost","root","","inventory1");
		}catch(Exception $ex){
			die($ex->getMessage());
		}
	}// end of connection method
	public function setSQL($sql){
		try{
			$this->setConnect();
			$r=$this->db->query($sql);
			if($rw=$r->fetch_array(MYSQLI_NUM))
				echo $rw[0];
			else
				echo "failed";
			//echo $r==1?"operation is done":"failed";
			$this->db->close();
		}catch(Exception $ex){
			die($ex->getMessage());
		}
	}// end of setSQL
	public function viewTable($sql){
		$this->setConnect();
		$this->result=$this->db->query($sql);
		$fields=$this->result->fetch_fields();
		?>
		<table class="table table-bordered table-striped">
			<thead class="bg-info">
				<tr>
					<?php foreach ($fields as $key => $value):; ?>
						<th><?php echo $value->name; ?></th>
					<?php endforeach ?>
          <th class="text-center">action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($this->result as $key => $row):$i=1 ?>
					<tr>
						<?php foreach ($row as $key => $value): ?>
							<td><?php 
              if($i==5){
                echo"<img src=".$value." width='60' height='60'>";
              }
              else{
                echo $value;
                $i+=1;
              }
              
                    ?></td>

                    
						<?php endforeach ?>
            <td ><button class="btn btn-primay bg-success text-white ">update</button><button class="btn btn-primay bg-danger text-white ml-2">delete</button></td>
          
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php		
	}// end of viewTable method
	public function fillCombo($sql){
		$this->setConnect();
		$res=$this->db->query($sql);
		while($r=$res->fetch_array(MYSQLI_NUM))
			echo "<option value=$r[0]>$r[1]</option>";		
	}
	public function search($sql){
		$this->setConnect();
		$res=$this->db->query($sql);
		if($r=$res->fetch_array(MYSQLI_ASSOC))
		{
			foreach ($r as $key => $value) {
				echo $value.",";
			}
		}
	}
}// end of class
?>
