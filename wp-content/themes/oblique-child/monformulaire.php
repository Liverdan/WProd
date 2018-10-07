<?php
/**
 * The template for displaying all pages
 * 
 * Template Name: MonFormulaire
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BAP
 */
get_header();
?>
<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
     <div class="post">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <?php the_content();?>
        <div class="formu-content">    
	    	<form method="post">
	    		<div class="block1">
				    <label>Votre nom : <input type="text" name="lastname" placeholder="Nom" value="<?php echo $lastname ?>"/></label>
				    <?php
					if (!$lastname && count($_POST)) {
						echo sprintf('<span>%s nom</span>', $alerte);
						$valid = FALSE;
					}
				    ?><br />
				    <label>Votre pénom : <input type="text" name="firstname" placeholder="Prénom" value="<?php echo $firstname ?>"/></label>
				    <?php
					if (!$firstname && count($_POST)) {
						echo sprintf('<span>%s prénom</span>', $alerte);
						$valid = FALSE;
					}
				    ?><br />
				    <label>Votre e-mail : <input type="email" name="mail" placeholder="e-mail" value="<?php echo isset($data['mail']) ? $data['mail'] : ''; ?>"/></label>
				    <?php
					if (!$amail && count($_POST)) {
						echo sprintf("<span>Votre adresse mail n'est pas valide</span>");
						$valid = FALSE;
					}
				    ?><br />
				    <div class="widget">
				    	<button id="opener" class="ui-button ui-widget ui-corner-all" type="submit" name="send"><?php echo $txtBtn1 ?></button>
				    </div>
			    </div>
				<div class="block2">
				    <h3>Vos priorités et niveaux</h3>					
					<!--formulaire priorités et niveaux-->
					<ul id="sortable">
					<?php
					global $wpdb;
	   				$nom_table = $wpdb->prefix .'categories';
	   				$requete = "SELECT * FROM  $nom_table ORDER BY Pos DESC";
					$wpdb->show_errors;
	   				$rows = $wpdb->get_results( $requete );
					$i=0;
					foreach ($rows as $row) {
						$i++;
					?>
						<li>
							<span class="fas fa-arrows-alt-v"></span>
					    	<input type="hidden" name="Categorie[<?php echo $i;?>][id]" value="<?php echo $row->id;?>"/>
					    	<input class="btnCat" type="button" name="Categorie[<?php echo $i;?>][cat]" value="<?php echo $row->cat;?>"/>
					    	<input type="hidden" name="Categorie[<?php echo $i;?>][mail]" value="<?php echo isset($data['mail']) ? $data['mail'] : '';?>"/>
					    	<input type="hidden" class="positionInput" name="Categorie[<?php echo $i;?>][Pos]" value="<?php echo $row->Pos;?>"/>
					    	<span class="fas"><b>0&nbsp;</b></span>
					    	<input type="range" id="custom-handle" class="ui-slider-handle" name="Categorie[<?php echo $i;?>][level]" min="0" max="10" step="1" value="<?php echo $row->level;?>"/>
					    	<span class="fas"><b>&nbsp;10</b></span>
						</li>
					<?php
					};
					?>
					</ul>
					<h5>Classer par ordre croissant, de haut en bas, vos souhaits de formation, en déplacant les flèches ci-dessus <span id="fleche" class="fas fa-arrows-alt-v"></span>.</br>Puis déplacer les curseurs correspondants à l'estimation de votre niveau de connaissance.</h5>
					<div class="widget">
				    	<button id="loader" class="ui-button ui-widget ui-corner-all" type="submit"><?php echo $txtBtn2 ?></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>  
<?php get_sidebar(); ?>
<?php get_footer(); ?>
