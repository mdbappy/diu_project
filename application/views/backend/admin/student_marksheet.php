
<hr />            
<div class="row">
    <div class="col-md-12">
        
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-users"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('all_students');?></span>
                </a>
            </li>
        <?php 
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <li>
                <a href="#<?php echo $row['section_id'];?>" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('section');?> <?php echo $row['name'];?> ( <?php echo $row['nick_name'];?> )</span>
                </a>
            </li>
        <?php endforeach;?>
        <?php endif;?>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane active" id="home">
				<select id="exam_id_for_all" style="height:30px;color:#000000;">
					<?php
						$get_exams = $this->crud_model->get_exams();
						foreach($get_exams as $exams):
					?>
					<option value="<?php echo $exams["exam_id"];?>"><?php echo $exams['name']; ?></option>
					<?php endforeach; ?>
				</select>
                <a target="_blank" onclick="viewTabulatioForAll(this,<?php echo $class_id; ?>)" href="#" class="btn btn-default" ><i class="entypo-chart-bar"></i> View Tabulation Sheet</a>
				
				
                <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div><?php echo get_phrase('roll');?></div></th>
                            <th><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                                foreach($students as $row):?>
                        <tr>
                            <td><?php echo $row['roll'];?></td>
                            <td align="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <!--<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_marksheet/<?php echo $row['student_id'];?>');" class="btn btn-default" >
                                      <i class="entypo-chart-bar"></i>
                                          <?php //echo get_phrase('view_marksheet');?>
                                      </a>-->
                                      <a target="_blank" href="<?php echo base_url();?>index.php?modal/modal_student_marksheet_print/<?php echo $row['student_id'];?>/<?php echo $class_id; ?>" class="btn btn-default" >
                                      <i class="entypo-chart-bar"></i>
                                          <?php echo get_phrase('view_marksheet');?>
                                      </a>
                                
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                    
            </div>
        <?php 
            $query = $this->db->get_where('section' , array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
        ?>
            <div class="tab-pane" id="<?php echo $row['section_id'];?>">
			
				<select id="exam_id_for_section" style="height:30px;color:#000000;">
					<?php
						$get_exams = $this->crud_model->get_exams();
						foreach($get_exams as $exams):
					?>
					<option value="<?php echo $exams["exam_id"];?>"><?php echo $exams['name']; ?></option>
					<?php endforeach; ?>
				</select>
				
				<a target="_blank" onclick="viewTabulatioForSection(this,<?php echo $class_id; ?>,<?php echo $row['section_id'];?>)" href="#" class="btn btn-default" ><i class="entypo-chart-bar"></i> View Tabulation Sheet</a>
				
				                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><div><?php echo get_phrase('roll');?></div></th>
                            <th><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('options');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $students   =   $this->db->get_where('student' , array(
                                    'class_id'=>$class_id , 'section_id' => $row['section_id']
                                ))->result_array();
                                foreach($students as $row):?>
                        <tr>
                            <td><?php echo $row['roll'];?></td>
                            <td align="center"><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <!--<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_student_marksheet/<?php echo $row['student_id'];?>');" class="btn btn-default" >-->
								<a target="_blank" href="<?php echo base_url();?>index.php?modal/modal_student_marksheet_print/<?php echo $row['student_id'];?>/<?php echo $class_id; ?>" class="btn btn-default" >
                                      <i class="entypo-chart-bar"></i>
                                          <?php echo get_phrase('view_marksheet');?>
                                      </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                    
            </div>
        <?php endforeach;?>
        <?php endif;?>

        </div>
        
        
    </div>
</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
	
	function viewTabulatioForAll(anchorObj,class_id)
	{
		var selectExam = $('#exam_id_for_all').val();
		anchorObj.href = '<?php echo base_url(); ?>index.php?admin/student_tabulation_sheet/'+class_id + '/' +selectExam;
	}
	
	function viewTabulatioForSection(anchorObj,class_id,sectionId)
	{
		var selectExam = $('#exam_id_for_section').val();
		anchorObj.href = '<?php echo base_url(); ?>index.php?admin/student_tabulation_sheet/'+class_id+'/'+selectExam + '/' + sectionId;
	}
		
</script>