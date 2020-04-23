<div class="app__content">

	<div class="card">
		<div class="card__container">
			<?php foreach($data as $row): ?>
                <form method="post" class="form-absen" action="<?php echo site_url('student/new_activity'); ?>">
					<div class="add__to-card">
						<input type="text" class="add__input" placeholder="<?=$row['activity_title'];?>" readonly/>
						<input type="hidden" name="activity_bank_id" value="<?=$row['activity_bank_id'];?>">
						<?php $sql = $this->db->get_where('activity_result', array('activity_bank_id' => $row['activity_bank_id'], 'date' => date('Y-m-d'))); 
							// echo var_dump($sql->num_rows());
							// echo date('Y-m-d');
							if($sql->num_rows() > 0) {
								echo '<button class="add__btn" disabled>Success</button>';
							}else{
								echo '<button class="add__btn">Confirm</button>';
							}
						?>
					</div>
                </form>
			<?php endforeach; ?>
		</div>
	</div>

</div>