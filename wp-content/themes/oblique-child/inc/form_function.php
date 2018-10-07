<?php
/*Si besoin de créer une table avec le changement de theme
function testTable(){
	global $wpdb;
	$tablename=$wpdb->prefix."contacts";
	if ($wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {
			
		$sql = "CREATE TABLE `$tablename` ( 
			`id_contact` INT(2) NOT NULL AUTO_INCREMENT ,
			`lastname` VARCHAR(20) NOT NULL ,
			`firstname` VARCHAR(20) NOT NULL ,
			PRIMARY KEY (`id_contact`)) ENGINE = InnoDB;";
	}
	


require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

dbDelta($sql);
}

add_action("after_switch_theme", "testTable");*/

// Récupération des données $_post depuis le formulaire présent dans monformulaire.php
			$data = $_POST;
			$valid = FALSE;
			$firstname = '';
			$lastname = '';
			$txtBtn1 = 'Enregister';
			$txtBtn2 = 'Envoyer';
			$alerte = "Vous avez oubliez de remplir votre ";
			$lastname = isset($data['lastname']) ? $data['lastname'] : '';
			$firstname = isset($data['firstname']) ? $data['firstname'] : '';
			$amail = isset($data['mail']) ? $data['mail'] : '';
			$now = current_time('mysql');
			
			
			if ($lastname && $firstname && $amail) :
				global $wpdb;
				$tablename = $wpdb->prefix .'users_formation';
				$wpdb->show_errors;
				$dataUsers= array(
					'name'=> $lastname,
					'firstname' => $firstname,
					'mail' => $amail,
					'time'=> $now,
				);
				$wpdb->replace($tablename, $dataUsers);
				//echo sprintf('<h3>Monsieur%s %s votre e-mail %s, il est %s</h3>', $lastname, $firstname, $mail,$now);
				$txtBtn1 = "Corriger";
				$valid = TRUE;
			endif;
			//var_dump($valid);
				global $wpdb;
				$tablename = $wpdb->prefix .'users_formation';
				$i=0;
				$cate=$_POST["Categorie"];
				//var_dump($cate);
				if ($valid == TRUE) :
				foreach ($cate as $c) {
					extract($c);
					$i=$i+1;
					$choixn="choix_".$i;
					$priorityn="Priority_".$i;
					$leveln="niveau_".$i;
					$wpdb->update($tablename, array(
						$choixn=> $id,
						$priorityn=>$Pos,
						$leveln=>$level),
						array('mail'=>$amail));
					//echo sprintf("%s %s %s %s %s %s", $choixn, $id, $priorityn,$Pos, $leveln,$mail);
				}
			endif;
