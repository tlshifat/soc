<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}

echo $this->Html->css('admin/plugins/toastr/toastr.min');
echo $this->Html->css('admin/animate.css');
?>
<script>
jQuery(document).ready(function() {   
	var message = '<?php echo $message?>';
	toastr.options = {
	    closeButton: true,
	    progressBar: true,
	    showMethod: 'slideDown',
	    timeOut: 8000,
	    showMethod: 'fadeIn',
	    positionClass: 'toast-top-right',
	};
	toastr.success(message);
});
</script>
