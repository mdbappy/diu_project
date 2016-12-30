<?php
	
	if($this->session->userdata('admin_login') != 1)
	{
		redirect(base_url() . 'index.php?login', 'refresh');
		exit;
	}
	
	$stu_info = $this->crud_model->get_students_roll_sort($class_id,$section_id);
	
	$get_exams = $this->crud_model->get_exam_info($exam_id);
	
	$subject_list = $this->crud_model->get_subjects_by_class($class_id);


?>

<!DOCTYPE html >
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Hege Refsnes">
<title>Tabulation Sheet</title>
</head>

<body>
<table align="center">
<tr>
<td align="center" style="font-size:36pxpx;"><b><i>School Name <br>
	Class Name: <?php echo $this->crud_model->get_class_name($class_id); ?> <br>
	<?php echo (!empty($section_id))? "Section:&nbsp;".$this->crud_model->get_section_name($section_id)."<br/>" : ""; ?>
Exam Name: <?php echo $get_exams[0]['name']; ?></i></b></td>
</tr>
</table>
<table  border="2" cellspacing="0" cellpadding="0" align="center">
  <!--<tr>
    <th colspan="<?php echo (count($subject_list) * 3)+3; ?>" align="center" style="font-size:36pxpx;"><b><i>School Name <br>
	Class Name <br>
Section Name<br>
Exam Name</i></b></th>
  </tr>-->
  <thead>
  <tr>  	
    <th width="32" rowspan="2">রোল নং </th>
    <th width="87" rowspan="2">নাম </th>
	
	<?php
		$i = 0;
		
		foreach($subject_list as $sbjcts):
	?>
    	<th colspan="3"><?php echo $sbjcts["name"]; ?></th>
    <?php endforeach; ?>
	<th width="101" colspan="2"> ফলাফল </th>
    <th width="101" rowspan="2">মন্তব্য </th>
  </tr>
  <tr>
  	<?php
		for($x = 0; $x < count($subject_list);$x++):
	?>
	    <td width="31" align="center">প্রাপ্ত নম্বর </td>
	    <td width="30" align="center"><p>লেটার</p>
	    <p>গ্রেড </p></td>
	    <td width="30" align="center">জিপিএ</td>
		
	<?php endfor; ?>
    
    <td width="39" align="center"><p>লেটার গ্রেড</p></td><!--Folafol-->
	<td width="39" align="center">জিপিএ</td><!--Folafol-->
  </tr>
  </thead>
  
  
  <tbody>
  <?php
  		foreach($stu_info as $stu_data):
  ?>
  <tr>
  <td align="center"><?php echo $stu_data["roll"]; ?></td>
    <td align="center"><?php echo $stu_data["name"]; ?></td>
  <?php
  		
		$result_point_addition = 0;	
		$fail_checker = "";
		$rslt_point = "0.00";
		$rslt_grd = "F";	
		foreach($subject_list as $sbjcts):
		
			$verify_data = array('exam_id' => $exam_id,
								'class_id' => $class_id,
								'subject_id' => $sbjcts['subject_id'],
								'student_id' => $stu_data['student_id']);

			$mark_query = $this->db->get_where('mark', $verify_data);
			$marks = $mark_query->row_array(0);
			$mark_gpa = $this->crud_model->get_grade((!empty($marks["mark_obtained"]))? (float) $marks["mark_obtained"] : 0 ); 
			if($mark_gpa["grade_point"] <= 0)
				$fail_checker = "Failed";
				
			$result_point_addition += $mark_gpa["grade_point"];
		
	?>
    
    <td align="center"><?php echo (!empty($marks["mark_obtained"]))? $marks["mark_obtained"] : "00"; ?></td>
    <td style="font-weight:bold;" align="center"><?php echo $mark_gpa["name"]; ?></td>
	<td style="font-weight:bold;" align="center"><?php echo $mark_gpa["grade_point"]; ?></td>
	
	<?php 
		endforeach; 
		if($fail_checker != "Failed")
		{
			$rslt_point = round(($result_point_addition / count($subject_list)), 2);
			$rslt_grd = $this->crud_model->get_point_to_grade($rslt_point)["name"];
		}
		
	
	?>
	
	<td style="font-weight:bold" align="center"><?php echo $rslt_grd;  ?></td><!--Folafol Grad-->
	<td style="font-weight:bold" align="center"><?php echo $rslt_point;  ?></td><!--Folafol Point-->
	<td>&nbsp;</td><!--Montobbo-->
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>







</body>
</html>
