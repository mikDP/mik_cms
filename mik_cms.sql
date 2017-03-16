-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 16, 2017 alle 11:26
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mik_cms`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` tinytext NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `menu` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `art_ass` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `category`, `active`, `menu`, `position`, `parent`, `art_ass`) VALUES
(14, 'Configurazione base', 1, 0, 2, 0, NULL),
(24, 'Login', 1, 0, 1, 14, NULL),
(25, 'System', 1, 0, 3, 0, NULL),
(26, 'Risorse del sistema', 1, 0, 1, 25, NULL),
(40, 'Home', 1, 1, 1, 0, 47),
(47, 'L\'azienda', 1, 1, 2, 0, 53),
(48, 'Riconoscimenti', 1, 1, 2, 47, 54),
(49, 'La storia', 1, 1, 1, 47, 55),
(50, 'Carico sistema', 1, 0, 2, 25, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `css_wys`
--

CREATE TABLE `css_wys` (
  `id` int(11) NOT NULL,
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `class_content` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `css_wys`
--

INSERT INTO `css_wys` (`id`, `class_name`, `class_content`, `type`) VALUES
(47, '.testo1', '.testo1 { font-size:10pt; color:#800080; font-weight:bold; font-style:italic; text-align:justify; } ', 'text'),
(48, 'img.imgRossa', 'img.imgRossa { opacity:0.2; border-width:3px; border-style:solid; border-color:#0000ff; } img.imgRossa:hover { border-color:#ff0000; } ', 'img'),
(51, 'table.tabellaRossa', 'table.tabellaRossa { background-color:#ff0000; border-collapse:collapse; font-size:12pt; color:#ff6600; text-align:left; font-weight:bold; font-style:italic; } table.tabellaRossa td{ border-width:3px; border-style:solid; border-color:#800080; vertical-align:bottom; } ', 'table'),
(52, '.titoloArancione', '.titoloArancione { font-size:22pt; color:#ff6600; text-align:right; } ', 'text');

-- --------------------------------------------------------

--
-- Struttura della tabella `docs_it`
--

CREATE TABLE `docs_it` (
  `id` int(11) NOT NULL,
  `title` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` int(11) NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `docs_it`
--

INSERT INTO `docs_it` (`id`, `title`, `date`, `category`, `content`, `home`) VALUES
(0, 'Header', '2017-02-13 15:36:47', 0, '<p><span style=\"font-size: 100pt; color: #ffffff;\">Mik Live</span></p>', 0),
(1, 'Footer', '2017-02-13 15:37:16', 0, '<p><span style=\"color: #ff0000;\">Michele Di Palma. Have Fun.</span></p>', 0),
(32, 'Accesso via Web Services', '2017-03-02 15:19:59', 24, '<p>Per accedere via web services ad inquiris, &egrave; possibile seguire il seguente esempio:</p>\r\n<p>Metodo POST;</p>\r\n<p>Tipo XML;</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-markup\"><code>&lt;s:Envelope xmlns:s=\"http://www.w3.org/2003/05/soap-envelope\"&gt;\r\n    &lt;s:Header&gt;\r\n        &lt;Security s:mustUnderstand=\"1\" xmlns=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"&gt;\r\n            &lt;UsernameToken&gt;\r\n                &lt;Username&gt;root&lt;/Username&gt;\r\n                &lt;Password Type=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordDigest\"&gt;R/20vCWU5BAdVNfooG8/DdRBi7o=&lt;/Password&gt;\r\n                &lt;Nonce EncodingType=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary\"&gt;kOZwfQlxikukyyvnTh26Oa8AAAAAAA==&lt;/Nonce&gt;\r\n                &lt;Created xmlns=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd\"&gt;2017-03-02T17:29:07.000Z&lt;/Created&gt;\r\n            &lt;/UsernameToken&gt;\r\n        &lt;/Security&gt;\r\n    &lt;/s:Header&gt;\r\n    &lt;s:Body xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"&gt;\r\n        &lt;GetCapabilities xmlns=\"http://www.onvif.org/ver10/device/wsdl\"&gt;\r\n            &lt;Category&gt;All&lt;/Category&gt;\r\n        &lt;/GetCapabilities&gt;\r\n    &lt;/s:Body&gt;\r\n&lt;/s:Envelope&gt;</code></pre>', 0),
(33, 'Accesso con Script PHP', '2017-03-02 16:25:03', 24, '<p>Esempio di accesso con script PHP:</p>\r\n<p>&nbsp;</p>\r\n<pre class=\"language-php\"><code>&lt;?php\r\n\r\nclass loginController extends BaseController {\r\n\r\n    public function autologin() {\r\n        $model = $this-&gt;registry-&gt;load-&gt;model(\'login\');\r\n        $from_ip = $_SERVER[\"REMOTE_ADDR\"];\r\n        $auth = $model-&gt;autologin($from_ip);\r\n        echo json_encode($auth, JSON_UNESCAPED_UNICODE);\r\n    }\r\n\r\n    public function login() {\r\n        $model = $this-&gt;registry-&gt;load-&gt;model(\'login\');\r\n        $login = trim($this-&gt;registry-&gt;post[\'login\']);\r\n        $pass = trim($this-&gt;registry-&gt;post[\'password\']);\r\n        $auth = $model-&gt;login($login, $pass);\r\n        echo json_encode($auth, JSON_UNESCAPED_UNICODE);\r\n    }\r\n    \r\n\r\n    public function index() {\r\n        \r\n    }\r\n\r\n    public function logout() {\r\n        $model = $this-&gt;registry-&gt;load-&gt;model(\'login\');\r\n        $auth = $model-&gt;logout();\r\n        header(\"location: login.php?logout=1\");\r\n    }\r\n\r\n}\r\n\r\n?&gt;</code></pre>', 0),
(34, 'Area System', '2017-03-02 16:44:17', 26, '<p style=\"text-align: center;\"><img style=\"width: 357px; float: left;\" src=\"/Inquiris_CMS/resources/assets/images/media/17_03_02-1488473285.jpg\" height=\"100\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>In questa sezione, &egrave; possibile verificare il nome del server, il kernel attivo al momento e l\' architettura della macchina (x86 oppure x86_64)</p>', 0),
(36, 'Gestione Storage', '2017-03-02 17:15:34', 26, '<p><img style=\"width: 420px;\" src=\"/Inquiris_CMS/resources/assets/images/media/Gestione-Storage.jpg\" height=\"116\" /></p>\r\n<p>Gestione delle risorse disco</p>', 0),
(47, 'Home', '2017-03-03 09:48:03', 40, '<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n</div>\r\n</div>\r\n</div>', 1),
(53, 'L\'azienda', '2017-03-03 11:01:10', 47, '', 0),
(54, 'Riconoscimenti', '2017-03-03 11:01:22', 48, '<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 0),
(55, 'La storia', '2017-03-03 11:01:28', 49, '<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n<hr />\r\n<div id=\"Content\">\r\n<div class=\"boxed\">\r\n<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor in arcu quis vehicula. Nullam tempor eleifend tellus, ultrices convallis risus mollis id. Vestibulum fringilla egestas ligula, in feugiat magna dignissim nec. Maecenas eu metus facilisis, tincidunt diam vel, dapibus augue. Duis aliquam id arcu sit amet auctor. Vestibulum quam est, varius non eros ac, scelerisque consequat magna. Suspendisse aliquam et metus lacinia ornare.</p>\r\n<p>Quisque sem massa, hendrerit id leo a, pulvinar tempor arcu. Quisque pellentesque orci vitae tempor condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce rutrum iaculis diam cursus suscipit. Quisque id enim sodales, rutrum tellus in, sollicitudin lectus. Vestibulum vitae sodales ligula. Pellentesque hendrerit leo ut nisi tincidunt, quis imperdiet nisl porta. Nulla ac sodales dui, sed condimentum massa. Nullam elementum eros eget sapien luctus, a venenatis tortor feugiat. Duis velit lectus, feugiat nec egestas at, imperdiet vel diam. Aliquam odio diam, rutrum at consectetur vel, iaculis nec nibh. Sed luctus odio ac semper posuere.</p>\r\n<p>Aliquam suscipit urna id lacus venenatis rhoncus lacinia vel est. Nullam laoreet dolor sit amet neque lacinia posuere. Mauris ornare, dui vitae consectetur gravida, felis sem lobortis justo, in aliquet sapien tellus eu dolor. Curabitur urna purus, iaculis ac posuere id, finibus non sapien. In eu feugiat lacus. Nam vehicula purus nec nisi volutpat vulputate. Vestibulum felis dui, fringilla non odio tempus, consectetur vulputate massa. Sed in semper magna. Nullam ligula ex, mollis at nibh nec, condimentum mattis dolor. Duis at dapibus odio, ut ornare sem. Mauris sem tellus, ultricies quis auctor eget, dictum non magna. Morbi faucibus dui libero, sollicitudin dapibus elit dapibus ut. Nulla eu dictum sem. Duis ornare feugiat quam vel efficitur. Fusce vulputate dictum risus non semper. Donec sed orci eu dolor commodo venenatis.</p>\r\n<p>Quisque tempor pharetra libero sit amet fermentum. Morbi fermentum elit eget iaculis eleifend. In dictum dolor metus, sed sollicitudin diam molestie vitae. Pellentesque dictum odio a ipsum dapibus rutrum. Suspendisse dapibus magna vel orci ultricies ultricies. Suspendisse at accumsan lacus, lobortis iaculis risus. Donec ac turpis lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus tempor purus orci. Aenean molestie nibh nec turpis vestibulum, sit amet maximus augue sodales.</p>\r\n<p>Nullam sagittis massa nisl, in mollis nisi euismod volutpat. Etiam placerat vestibulum mi sed euismod. Phasellus feugiat erat velit. Curabitur pellentesque imperdiet ante, id bibendum arcu suscipit eu. Curabitur arcu eros, interdum eget ante et, tempus rutrum nisi. In rutrum pretium tortor, eu sollicitudin sapien varius in. Nulla sollicitudin risus eget mauris dapibus, at pellentesque ipsum efficitur. Proin vel lacus sem. Vestibulum vitae velit eget ante pellentesque aliquet eu sit amet ante.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `lingue`
--

CREATE TABLE `lingue` (
  `id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `lingua` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `lingue`
--

INSERT INTO `lingue` (`id`, `lingua`) VALUES
('en', 'inglese');

-- --------------------------------------------------------

--
-- Struttura della tabella `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `path` varchar(255) NOT NULL,
  `usedin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `usedin`) VALUES
(27, '17_03_02-1488473285.jpg', '/Inquiris_CMS/resources/assets/images/media/', NULL),
(28, 'Gestione-Storage.jpg', '/Inquiris_CMS/resources/assets/images/media/', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user` varchar(20) NOT NULL,
  `password` char(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user`, `password`) VALUES
('andrea', '$2y$10$QCCUMcc6gOwUlz4MCIe.guKdweCP0lPZyLKc6akbCYRD3jkKf5OQO'),
('lino', '$2y$10$LpfnwUxFAwgKiMQ7rBgnB.xXAcPLPwDClilu4Ul70.dVApdRFS23C'),
('michele', '$2y$10$UStDAhB5ddP5RCbrqxh85OnRnm/VWf6pFKZCSmTS5hQg8cMPwzgVG'),
('sample', '$2y$10$vrOZeSOf1wkH3wB/EPsUuuB338r22cgCOdTsm0yqeX4LsRXpd6PE.');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `css_wys`
--
ALTER TABLE `css_wys`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `docs_it`
--
ALTER TABLE `docs_it`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lingue`
--
ALTER TABLE `lingue`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT per la tabella `css_wys`
--
ALTER TABLE `css_wys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT per la tabella `docs_it`
--
ALTER TABLE `docs_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT per la tabella `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
