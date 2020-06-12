

		<script>
			$(function(){
				$('dt').click(function(){
					var obj=$(this).next();
					if($(this).next().css('display')=='block'){
						obj.hide('fast');
						$(this).removeClass('on');
					}else{
						obj.show('fast');
						$(this).addClass('on');
					}
				});
			});
		</script>
	</body>
</html>