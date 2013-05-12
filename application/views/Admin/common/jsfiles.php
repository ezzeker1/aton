 <?php echo load_js($assets_js,'admin');  ?>
<?php if(isset($tinymce)) echo $tinymce; ?>
<?php echo $this->notify->get(); ?>
</body>
</html>