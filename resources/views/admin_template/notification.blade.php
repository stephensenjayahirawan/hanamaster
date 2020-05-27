<?php
//if($this->session->flashdata('success_message')){
	?>
	<div class="row">
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php //echo $this->session->flashdata('success_message');?>
        </div>
    </div>
	<?php
//}
//else if($this->session->flashdata('error_message')){
	?>
	<div class="row">
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php //echo $this->session->flashdata('error_message');?>
        </div>
    </div>
	<?php
//}
?>