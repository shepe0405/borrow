
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery.mask.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.sidenav').sidenav();
				$('.tooltipped').tooltip();
				$('.modal').modal();
				$('.datepicker').datepicker({
			        i18n: {
			            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
			            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			            weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
			            today: 'Hoje',
			            clear: 'Limpar',
			            cancel: 'Sair',
			            done: 'Confirmar',
			            labelMonthNext: 'Próximo mês',
			            labelMonthPrev: 'Mês anterior',
			            labelMonthSelect: 'Selecione um mês',
			            labelYearSelect: 'Selecione um ano',
			            selectMonths: true,
			            selectYears: 15,
			        },
			        format: 'dd/mm/yyyy',
			        container: 'body',
			        //autoClose: true,
			        //disableWeekends: true
			    });
			    	$(function(){
			    $("#tabela input").keyup(function(){       
			        var index = $(this).parent().index();
			        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
			        var valor = $(this).val().toUpperCase();
			        $("#tabela tbody tr").show();
			        $(nth).each(function(){
			            if($(this).text().toUpperCase().indexOf(valor) < 0){
			                $(this).parent().hide();
			            }
			        });
			    });

			 
			    $("#tabela input").blur(function(){
			        $(this).val("");
				    });
				});
				$('.materialize-textarea').characterCounter();
				$("#search").on("keyup", function(){
					var value = $(this).val().toLowerCase();
					$("#prod_table tr").filter(function(){
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
				$('input').keypress(function(e){
					var code = null;
					code = (e.keyCode ? e.keyCode : e.which);
					return (code == 13) ? false : true;
				});
			});
			function validar()
				{
					var senha, senha01;
					senha = $("#senha").val();
					senha01 = $("#senha01").val();
					if (senha != senha01) {
						M.toast({html: 'Senhas não Correspondem', displayLength: '8000', classes: 'red darken-4'});
						return false;
					}
				}

			function textLower(x)
			{
				text = x.value.toLowerCase();
				x.value = text;
			}
			function showPwd()
			{
				var x = document.getElementById("senha");
				tipo = (x.type == "password") ? "text" : "password";
				x.type = tipo;
				
			}
			function showPwd01()
			{
				var x = document.getElementById("senha01");
				tipo = (x.type == "password") ? "text" : "password";
				x.type = tipo;
			}

				function changeIcon(eye)
				{
					icon = (eye.innerHTML == "visibility_off") ? "remove_red_eye" : "visibility_off";
					eye.innerHTML = icon;
				}
		</script>
	</body>
</html>
