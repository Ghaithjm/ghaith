<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'badr');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'No_RmP+brCTf!T-*r<u@;(3F5m&UZbeb>UQbCscO&eU=MusX5,B{DV<4b8~!_4+j');
define('SECURE_AUTH_KEY',  'W[+e~qMU L^f;ThZ>(%b0pt@rn74v^|rua5V0Q]{9U/84oK.,fNrt]GSq}R7JNG8');
define('LOGGED_IN_KEY',    'xC? I%TINIK)^IgYc%W6O_ql;wf)-S.EZ<tAn9Y?7]ry{)%(<d)<+dxu_wseeJL+');
define('NONCE_KEY',        'L?_.XP%U;>#s) Nn@EWDtsqPeMH}!7qo>z_{zrK^78eA]A4{!};;(-dIBw*;[MQ/');
define('AUTH_SALT',        'QPt(qHmL[$ak~bR}[XVsH/GE;%qh.Z_fl^EbZah-|BJ41o@2v%lTuRT0ESUnyed9');
define('SECURE_AUTH_SALT', '&>mo!PUL;dOhKr!H,ebnIZM1XY6,q5ZXO!}*:w$7vc*C]k(Tr)3[|Ey%a_erc$Zl');
define('LOGGED_IN_SALT',   'pvrx`I(D;NFPXZ@]qRAkX+9_MvUNJP)qu-A*,8SXgf.m _(rYn-e80EGLr+EW3]~');
define('NONCE_SALT',       'b6|fuMKl-!*!5%/_~qW=tr<[pS<+5I$dE~T)JjQ/!R9]=C|nNogUj$^+^vf|*-pk');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');