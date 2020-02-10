<?php if (!empty($_POST)): ?>
	<pre>
		<?php
		$checkEmail = Db::db_select('users',['email'=>@$_POST['email']]) ? true : false;
		$checkPhone = Db::db_select('users',['phone'=>@$_POST['phone']]) ? true : false;
		?>
	</pre>
<?php endif ?>
<div class="limit">
	<div class="part">
		<?php if ( isset($_GET['reg']) ): ?>


			<div class="padd- bg-w-">
				<div class="content padd-v-2-">
					<div class="part">
						<div class="ta-l">
							<p>Почему бы Вам не стать почетным гостем нашего заведения?</br>
								Для этого необходимо пройти регистрацию, ответив на несколько вопросов. 
								После чего Вы получаете электронную клубную карту, которая дает следующие привилегии:
							</p>
							<ul>
								<li>Доступность разнообразных акций и скидок</li>
								<li>Возможность посещать закрытые мероприятия</li>
								<li>Возможность регистрироваться на мероприятия on-line.</li>
							</ul>
						</div>
						<div class="ta-c">
							<img src="<?php echo get_template_uri() . 'img/club-card.jpg'; ?>" alt="Клубная карта Мания" class="w-100p" style="max-width: 30em;">
						</div>
					</div>
					<form method="post">
						<div class="part">
							<input type="hidden" name="reg" value="1">
							<p>Имя:</p>
							<p><input class="w-12" type="text" name="firstname" placeholder="Имя" value="<?php echo @$_POST['firstname']; ?>" required></p>
							<p>Фамилия:</p>
							<p><input class="w-12" type="text" name="lastname" placeholder="Фамилия" value="<?php echo @$_POST['lastname']; ?>" required></p>
							<p>Дата рождения:</p>
							<p><input class="w-12" type="date" name="birthday" value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : '1990-01-01'; ?>" required></p>
							<p>Телефон:</p>
							<p><input class="w-12" type="tel" name="phone" placeholder="Телефон" value="<?php echo @$_POST['phone']; ?>" required></p>
							<?php echo @$checkPhone ? '<div style="color:red;">Такой Телефон уже зарегестрирован!</div>' : null ; ?>
							<p>Email:</p>
							<p><input class="w-12" type="email" name="email" placeholder="Email" value="<?php echo @$_POST['email']; ?>" required></p>
							<?php echo @$checkEmail ? '<div style="color:red;">Такой Email уже зарегестрирован!</div>' : null ; ?>
							<!--<p><input type="password" name="password" placeholder="Пароль" required></p>-->
						</div>
						<div class="part">
							<p><b>Какие из нижеперечисленных мероприятий могут быть Вам интересны?</b></p>
							<p><i>Развлекательные/игровые:</i></p>
							<p>
								<input type="checkbox" id="par1" value="Да" name="properties[Развлекательные и игровые][мафия]" <?php echo @$_POST['properties']['Развлекательные и игровые']['мафия'] ? 'checked' : false ?>>
								<label for="par1">мафия</label>
							</p>
							<p>
								<input type="checkbox" id="par2" value="Да" name="properties[Развлекательные и игровые][монополия]" <?php echo @$_POST['properties']['Развлекательные и игровые']['монополия'] ? 'checked' : false ?>>
								<label for="par2">монополия</label>
							</p>
							<p>
								<input type="checkbox" id="par3" value="Да" name="properties[Развлекательные и игровые][другие настольные игры]" <?php echo @$_POST['properties']['Развлекательные и игровые']['другие настольные игры'] ? 'checked' : false ?>>
								<label for="par3">другие настольные игры</label>
							</p>
							<p>
								<input type="checkbox" id="par4" value="Да" name="properties[Развлекательные и игровые][speed dating (быстрые свидания)]" <?php echo @$_POST['properties']['Развлекательные и игровые']['speed dating (быстрые свидания)'] ? 'checked' : false ?>>
								<label for="par4">speed dating (быстрые свидания) dating (быстрые свидания)</label>
							</p>
							<p>
								<input type="checkbox" id="par5" value="Да" name="properties[Развлекательные и игровые][караоке]" <?php echo @$_POST['properties']['Развлекательные и игровые']['караоке'] ? 'checked' : false ?>>
								<label for="par5">караоке</label>
							</p>
							<p>
								<input type="checkbox" id="par6" value="Да" name="properties[Развлекательные и игровые][кинопоказы]" <?php echo @$_POST['properties']['Развлекательные и игровые']['кинопоказы'] ? 'checked' : false ?>>
								<label for="par6">кинопоказы</label>
							</p>
							<p>
								<input type="checkbox" id="par7" value="Да" name="properties[Развлекательные и игровые][тематические вечеринки]" <?php echo @$_POST['properties']['Развлекательные и игровые']['тематические вечеринки'] ? 'checked' : false ?>>
								<label for="par7">тематические вечеринки</label>
							</p>
							<p>
								<input type="checkbox" id="par8" value="Да" name="properties[Развлекательные и игровые][любые]" <?php echo @$_POST['properties']['Развлекательные и игровые']['любые'] ? 'checked' : false ?>>
								<label for="par8">любые</label>
							</p>

							<p><i>Обучающие тренинги/мастер-классы:</i></p>
							<p>
								<input type="checkbox" id="par9" value="Да" name="properties[Обучающие тренинги и мастер-классы][направление «бизнес»]" <?php echo @$_POST['properties']['Обучающие тренинги и мастер-классы']['направление «бизнес»'] ? 'checked' : false ?>>
								<label for="par9">направление «бизнес»</label>
							</p>
							<p>
								<input type="checkbox" id="par10" value="Да" name="properties[Обучающие тренинги и мастер-классы][направление «психология»]" <?php echo @$_POST['properties']['Обучающие тренинги и мастер-классы']['направление «психология»'] ? 'checked' : false ?>>
								<label for="par10">направление «психология»</label>
							</p>
							<p>
								<input type="checkbox" id="par11" value="Да" name="properties[Обучающие тренинги и мастер-классы][направление «искусство»]" <?php echo @$_POST['properties']['Обучающие тренинги и мастер-классы']['направление «искусство»'] ? 'checked' : false ?>>
								<label for="par11">направление «искусство»</label>
							</p>
							<p>
								<input type="checkbox" id="par12" value="Да" name="properties[Обучающие тренинги и мастер-классы][любые]" <?php echo @$_POST['properties']['Обучающие тренинги и мастер-классы']['любые'] ? 'checked' : false ?>>
								<label for="par12">любые</label>
							</p>

							<p><i>Проведение ваших мероприятий:</i></p>
							<p>
								<input type="checkbox" id="par13" value="Да" name="properties[Проведение ваших мероприятий][разовых (ДР, корпоратив и т.д)]" <?php echo @$_POST['properties']['Проведение ваших мероприятий']['разовых (ДР, корпоратив и т.д)'] ? 'checked' : false ?>>
								<label for="par13">разовых (ДР, корпоратив и т.д)</label>
							</p>
							<p>
								<input type="checkbox" id="par14" value="Да" name="properties[Проведение ваших мероприятий][регулярных (курс семинаров и др.)]" <?php echo @$_POST['properties']['Проведение ваших мероприятий']['регулярных (курс семинаров и др.)'] ? 'checked' : false ?>>
								<label for="par14">регулярных (курс семинаров и др.)</label>
							</p>

							<p class="b">Желаете ли получать рассылку на e-mail?</p>
							
							<p>
								<input type="radio" id="yes" name="properties[Желаете ли получать рассылку на e-mail?]" value="Да" checked/>
								<label for="yes">Да</label></br>
								<input type="radio" id="no" name="properties[Желаете ли получать рассылку на e-mail?]" value="Нет"/>
								<label for="no">Нет</label></br>
							</p>

							<p><button type="submit" class="radius-2">Зарегистрироваться</button></p>
						</div>
					</form>
					<div class="pнаправление «искусство»">
						<p>Уже есть учетная запись?</p>
						<p><a href="?" class="button empty radius-2">Войти</a></p>
					</div>
				</div>
			</div>


		<?php else: ?>
			<div class="ta-c">
				<h3>Вход</h3>
				<form action="" method="post" class="marg-a w-100p" style="max-width: 20em;"></p>
					<p><input class="radius-2 w-100p" type="email" name="email" placeholder="email" required></p>
					<p><input class="radius-2 w-100p" type="text" name="card" pattern="\d{6,6}" placeholder="№ карты" required></p>
					<p><button type="submit" class="radius-2">Войти</button> <a href="?reg" class="button empty radius-2">Регистрация</a></p>
				</form>
			</div>
		<?php endif; ?>
	</div>
</div>