<?php require_once 'header.php'; ?>
<?php require_once 'top2.php'; ?>
<?php require_once 'dp_side_bar.php'; ?>
<div class="col-md-9">
</div>
<?php if($this->session->flashdata('massage')){
    $massage = $this->session->flashdata('massage');?>
    <div class="<?php echo $massage['class'] ?>"><?php echo $massage['massage']; ?></div>
<?php } ?>

</body>
</html>
<script>
/** After windod Load */
$(window).bind("load", function() {
window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
$(this).remove();
});
}, 4000);
});

</script>