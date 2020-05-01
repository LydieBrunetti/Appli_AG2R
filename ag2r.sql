-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 25, 2019 at 08:42 PM
-- Server version: 10.3.9-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag2r`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `adresse_email` varchar(255) NOT NULL,
  `temps_creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `mot_de_passe`, `adresse_email`, `temps_creation`) VALUES
(1, 'test', 'test123', 'test@test.test', '2019-04-27 07:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_depart` datetime NOT NULL,
  `nombre_participants` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nom`, `location`, `date_depart`, `nombre_participants`) VALUES
(1, 'THE BQM', '3 rue des bqm', '2019-04-27 18:31:11', 4),
(2, 'THE BQM - la suite', 'rue des suitess 218', '2019-04-25 17:03:41', 7),
(6, 'THE BQM - le retour', 'retournac', '2019-04-25 17:03:41', 1),
(8, 'THE BQM - le millieu', 'rue millieuy', '2019-04-25 17:03:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_registrations`
--

DROP TABLE IF EXISTS `events_registrations`;
CREATE TABLE IF NOT EXISTS `events_registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confidential_code` varchar(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `events_registrations`
--

INSERT INTO `events_registrations` (`id`, `confidential_code`, `event_id`) VALUES
(3, 'CwTw+,3F%fw@tW.X0@?45\'|cYC=Sp)qj54EOa=<3!vur@kO4OrR\'>iQ;Q6-bm7?b8~6P6N=Q*4zd~1', 2),
(16, 'Q)md.WJY|+-]d7cX~N|}lWLNmx;pb~jdn-mz[fc6muC]Pxjg4?e64Uph`/PNSNz#/aoDVMA*^=t_WH<S.ekv_RHNL8_B@~QK[g', 1),
(17, 'Xm{{gKT2T?V]a<{mcT~mgr2P/Y>A#.Qs[*E:(!PB^;pQR!ku~hs,04-oq*4=6&A6=sKtKa8(BfWpi?qYbSH', 2),
(18, '~>cX#8d>Q2<@A{$g_wJ-mRbW,]\"921hZd7\'3xyh?!(l;o`-_op{AF:!pG~A,Qu9#7fK{LBXSs$PuIN]%K@4`H,', 2),
(19, 'i)c!|bQrzcQov&\"QDQdhVIzoI%ORWG6{Tp}pSq+z#\'W$<[r`UIfg,k~fg`eZc0N6NivauW0]rEL35:#I2G:hR', 1),
(20, 'D;@ddL:QDKOq^6JPaN)5^f}:U(5^D8dQpw0-G$iH1b/e:`BH8!U2|[OgVmK6?@~Y)2byuN;qh$', 2),
(21, '~SM|*Z`7fpPrih6]8@XTlCAy4S\'.\'Hp}P6ak6|15o_x\'1E)byN45\'#%_bB2qp*O)FbS]xzH97VGOzPHm8v;F`B.j(~>h%n+r', 1),
(22, '#65)^', 2),
(26, '#65)^', 2),
(27, 'pPrih6', 1),
(28, '7fpPrih6]8@', 2),
(29, '7fpPrih6]8@', 2),
(30, '7fpPrih6]8@', 6),
(31, '7fpPrih6]8@', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero_telephone` int(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `fonction_entreprise` varchar(255) NOT NULL,
  `photo` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=ascii;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `numero_telephone`, `nom_entreprise`, `fonction_entreprise`, `photo`) VALUES
(14, 'nomtest', 'prenomtest', 'mailtest@test.test', 'abcd', 31, 'nomentre', 'fonctionrentre', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060712121215131112151515151515151517151515151515151515161615151515181d2820181a251b151521312125292b2e2e2e171f3338332d37282d2e2b010a0a0a0e0d0e1a1010172d1d1f1d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2b2b2d2d2d2d2b2d2d2d2d2b2d2d2d2d372d2b37ffc0001108010300c203012200021101031101ffc4001b00000105010100000000000000000000000400020305060107ffc400381000010302040305080202000700000000010002030411052131411251610613718191223242a1b1c1d1f052e123f11415337282a2c2ffc400190100030101010000000000000000000000010203000405ffc40023110002020202020203010000000000000000010211032112314151132232617104ffda000c03010002110311003f00a2a2c3cbb370b0faa96aa91a064029f10af1136e565e4af9a62446d73ac732340b9629c8ed9494426ae86f9b75fdd555cd01d40cc6df65718054bdee2c90668fc470bb8e268cfe451e54e98bc792b466609cb487b0d9c3e7d0adde0f5e266070f31b83c961aa61b663cc6fd54f8257986506fecbb277d8ad28da1533d11a9f64c85c1c01e6325206a89415976c9c02eac01b64ac9d649130ce14ac9f6496311d97085215c5804642610a52130844c42e0a37053b828dc1631038289c14ee50b82010690285c113205555b5c1b93733cff1cd63244f649531ef4e7677aa4b50744bda37b9ce01a38af7cb5d3c10f8135cd94ba26bb86d6b3ad7b96ef6db8afe4af620e1346f02e6efb7a00aea368bdec388ea401f255e74a81f15cacacc3f0ae0373ef1399faabc34d929a9698937211cf8b2509cf674420603b4387f09ef1a32f8c731fcbc42ce4ccb781cc782f4caea6bac1e2b45ddbf87469b96743bb7f0ab8e56472c38bb2f7b2388ddbdd38e9eef8725a9695e6345318dc1c36d57a261b56d91a083b259aa62a61764e0905d5331c4976cb898c70ae593922b006ae272e144c3484c72748f0d1726c1559c61a5e1a07b24d89fa792cdd0526c39ca27299ca095c00b9360b008ca1aa6a1acd4f96e87aac4b667f67c0211940e71e290f96e7c4a0adf435576435154f94f0b065f2f32bb05086e673773d8782b3653802c0582e96593d50ae5605dcae22b85242c1458c14e5b9585f3b1dc5f5561494d6d91d2d302a00e2d2a3c8ede21d144a774392869aa8144f1ac3595b550acbe3d8789185be87911a15aeaa392a59db74d0744b22b3cda30736bb2737d93e5fbf35a0eccccde2e076bb106c501da4a7eee66bc68fb83e287648410e6ea0dd743568e55a747a4c6deaa5b2aac1b146cad19d9c350ad439468612e28aa2a98c1ed1b74dcf92af93127bbdc6587376be883924328b7d168915501f37f3f90fc27b7107b3df1c4398c8fa6e829a0bc6d1681229904cd78bb4dc7eea9e9c99578ed39730387c3a8e9cd66080091739e79fd96e5cdbeba2c962b49ddb88e59b7ab4a492f2571bf0190631660047b405ae743d5405924d99f65bccfff002d55349583bd6dfdd073fa5fc96bd8c4ea0bc9394aba02a6a26b3dd19ee4e654e2353909a426b16bd9090a3705390a27a0120b24bb649031aba79ee14cea6e21a2a486531bec742b414d58d03651e3b3b54b45748de0b8df54753cdec8beb64331a1ef71db208c7456d13354844ecafc42a4b4697d90a5a6d722d719283139b8dc037469049e6792b09338c74402d188ed94378efbb5c0fdbeeb354d2dfe6b67da8a72e89cd1a9b5bc41bfd960a2b83cb3cfc57563dc4e39ea45c535598ddc434babe3da7f66c00e23bf2f2e6b31d36dbec862e2095b8a61ba36d874cd7e64dddbdf55710b02f36a7ae734820ad7e118eb5f60ec9df22a193135b4744269ad1a56c2141554c2ca7866b84a678b29219b332e91f13eec36e6363e215d61d89365cbdd76edfb8e6ab6b999aaf2cb6632234235554c938d9b02abb19a5ef1971ef3731d7984cc2b12ef3d97e4f1ff00b0e63aab029bb25b8b30d4d42e7bad1b7c4ec3c4ad652425ac6b5c6e40b5d10d8c3720001d1228a34a5644531ca4298e58088ca89ea52a27ac122497571631a2aba6e2008b5c7cc7243c14e6f7232e5728d749928659aca76751614cd16b6884aeaa27fc519bb8ea47c21554f8adcf0467fee3b0e97561432c71b4eee3a9dd0fe94843c9154510670b41bee558b20ff1e7ba869e3323ae7456af8f2424cd2d991c521cc0eab1d8d61563c402dde2bef81e680aaa60e09e33e273ce3679e349191d414a4cf31fed68716c1cd8b9a331f31b859b2d2323b7d17446499069a23732fd0a4c790bb65c945b54e2a7469305ed0b9becb8dc723f62b4f15607b6e0dc1fdcd79802ac70fc55d1ef97eeaa33c49f474432a7a66d2a4aaf2fcd2a7ae6c82e35f550ccd21d7f55149ad319a3b2dc10e6e44660ad0e1988095bc9c3de1f71d167e42878a7746e0f6ea3d08e453a11ab366534a1e86b5b2b789be63707915394488c728dc9e530958230a89ea4728dcb188925dba4b1ac3595e08d53e71de5b336dd62198b96ea331ad8fe5154fdaf60d491e2d2b707e0b7c8bc9a7ff97b01cbf0ace8a89a33256419da889df1044d3f69583e2c9238c8a46699bf80809d55520058e8bb4ed3a1b9e433539ac924f78708e5b9f1e4a74fc8ee487cafe37977a225915c28616a3e18f2598809ff000c0e4567716c003ae5a33bfc96bec0f8a8dd02ca4d038a679ad560cf66de0817d2bad90d17a9ba8dae1670f355b3608dbdc6bf2775f1555998bf0a679849159464af49acece4520cc70bb980a8ea7b26e1eeb81e842a473c5f64e5864ba3354b52e61bb4fef50b45458cc720e193d9773d9083b33393933e63ee949d99a96fc00f8107ee99ca2fc860e70f059c9191d46c7a289cd556defe0d439bd0fba7c8a262c481f79b6ea3f08387a0f24ff4494f50e85fc4cf31b11c8ad4d0620c99b76ebbb4ea3fa594739a730414fa60e61123351e84723d1274071b3604a638a8692a848d0e1e6391dc29094491c728dc9c4a8deb188d249240c616a1dc59efd156b8137d0a73a42d39ea35ea126c80e6355d31544e4ec8a09dd19b85a3c331a61b07b47a0550d906e014846c3cc782128a66849ae8dfd1d4b7e103d3fa56514a1cbcf682a5d19f65d71c8fe42d4e1f8bb1c3dab077d572ce0d1d509d9a78d9645c73002cab29aa7880b668a6c04a8d95ab08d4dd1b036faa0e0851f1350b0d113a1d571cc08a7050b9a831811ec4398ee8d7b53638d20e88a3814c200898e25388ac990aca4acc3c3869759aafc06375ec381c35e1c811fc80d2fd16f258d52d7c441e21a82af8e6e2c55574d68f39c43099613cc6ce1a144e15583fe9bf23b5f75ae92206ed23222e2ffc4ecb298b61ed63b7e1d8eed2baa715246c98387da3d04d24ddd496f85f91f1d8fd95d92b28d7388e07e66d93bf90fcabec36a78e304ea3d97788dfe85497a39b22f2144a6397494c2566898c5d4dba4818f3e9c0233d47edd5713628a6499e6a79a9dae1cb910ba56846b97402c9948c910b2c65a6c42687109a89dd164d954b1d670ede85011ca5131d4039103d12b451335fd9dc70e5c572d073e617a1d0cad7b439a410730578a3262c21cc3a2d8f6731a0edf848d40d3c6df65c9971f9475e39de99e8cc6a95aab68eab89b7463675cc5c212e0513260886480ac2bd034ec4d85aa7ab6e4a088a5f23a61913512188685e8e8c2a4509260933155d6c792ba982adab098433af1603a12df27663e6ab2be10eb83bab6acc83fc5a7d0a0a75dd8ddc51db0fb40ccf71c3761d3e13c94984ca5b2169f887cc7f5f444d50bb88f02abaa4f0b8386ad20fa28bd48e19abb45fb8a638ae35f7008dc5d35c531cc2ba499749298c13a309f10d959c18339df15bc958d2e0441d6e3c0267962bc948e2650ba90b86638874d42aba9a62d3d17a553e0e3c93717ecc31ecb8c8dc20bfd0ba61961b4799009e158e2f843e0710465f2f155d65d09df472b8b8ba648d7108ba3a9746e0e6e4466836a998106831747a66038a0786b81b075c11fc4f2fde6b41c6bc8f0aae744f16d2e2ebd5e8de24635c342015e7e6c7c59e8629f243cce54915690534c6a3744a255a2ea1a9120b6ea1d0aa705cd3708f8ea83c7270d4222d507c4f561048a9e2911714a9a209074ae55b5254f24a81aa97254449b29311393fa968f528198a22b24bd87325de432082a97d82ee82a8a3b61a82b2b267ff0093c8282b2342b263debafbe63c159482e173cdfd8e4bb6ce6172dd96dda6de5a844b8aaea23c2f2398f98fe91c4a75d1cb254c6dd24c25258059c148022590a7b42712b891dac7c46ca77cc0b0aac9a62155bebde4d9aa8a362f2a2c316819330dc03cff00afaaf3bc530d31388d5bb15ad74ee06fcf55d929c48d2c22e0e9cc1b6c55b1be2e84705934608354cc46e21873a2770bb43a1e639a11add8ae9b399c1c5d31c46ebd0bb035a5cc2c26f6fbac0b1975a5ec2557773869d0a8e68dc4a627523d304375c7d3ab2861040b291f4eb868ebe4523e9d053539198c8ad13a142cf02341e4544153ebb8fba3a39baa02b62e13c436d7a8e49026c1cdcc1cd350ad87c953cd5656555ee2f96e7a7e5075550e06da7d4df60a39413ae43603ea7995d18f1ded8d0c77b6472497249cafb720340839bda0790463299ced721f35daa8806d868a9932a4a90d967aa465676d9c1de455ac26ed425447a85da296d91d949ed1cc855038487723fed165c81aaab8f4e36fa84a8ea1a470820db91be49a16264aec2ee928ee927245f778b9dea8589af0b8a276487ceeb8548d770bcab073d57558cee15e24d864a411928c5f439723cb92059576d54edaa0ec966a809d0654d109e32d3aead3c8eff3042c64b0169208cc5c7a2d961731b91c8fc88cbe6107da3c3eceef00c9daf8ae84f565b3c39c14d7667226823a8fdb2362b821ecd5b98f2d50e59c2ee851503ec8b3891ec1d97c5db3c0d78d6c03872235579c60af1eecc62a69e5b83ec3cd9c39755e9f4f5ad2355c9387167447683a46a1656299b2a82a244b41b2ab116e4550d1e23c01cdcb276fa007fdab5c4e7c967e92025f6d5ce75cf4cac07901f354c714fbe8782b7b2d2084c86e7d7978230d386e83f28881a1ad006c9b2e896791c9d2e8329b97f009e10550dba3dc10b3b520a67abe2b66a8b13a6e36e46c467fed6a312192a6e1558ba124af456e17843083c62e7cf24d928dac77b31b816916735c49f120ab8a5670bfa1cbf0a2adbb1fa5c6f6faa7536d9be38f1109c6e0fa24898aa016836d87d124bc9fa07c2bd974c624f6225ad5c73573c4ab2a676a0e6192b5aa8d56540b2bc441330f6b980f30155d553161cefd0857f4dee37c02e54421c2c53d11e5b29e8e52d7715eed200d3420822ff35a42c12c658771e879accd4533a3248cdbf6ea8dc1ebfe12731a750a9195e8ecc391745357c25aee1764e69b7a26f77a5b7cdbe3bb7c568b1ca312b389bef019f51f90b2d13f84963bcba1d884e46789425fa64bdfdb3df71f55a5ecfe3a4da32eb72be7e4a82a61e31c43de1a8fe5fdaad8e431b811cff42c64de295f83d5457ccde47c0fe5365c5e5dda7d42a1c2317ef182fa8c9152ce8f15e8eefa495d0eaaab7bb5f67c0dcfaecac3b374fef3cf80fbaa7822323ac3ccad553b431a00d9473494571447249748ec8fb285f22e4ee42f1ae5224e4a1e62a52ec90d2158c56d7aaae1cd5c54b55748ccd3a62b1ddd5c21248ed7be7e28f88a8ea1a82610164790cf64934b4f349386d1af6a715146e4e71514660f3054f5c2d756f368aa2ac5cdb99b2b44461ec8ecd683b01f44d704655ea3c10ae0aa73034acbe45525652961e26e97f457ce50cad5a864e8068b15d9c6dd79a1f13a20f1c4dd7a296bb0eb8e266bb8e7e081a79ad95c8fde48f3f674acbc97196c8f0d94df85daefe5ba26ba841cf5075fca6cd4e490e0731bfe55852b0919bade48f388d192aa667e9e47c4fc8e635e4e0b5386bcce01190dff00080acc345ee14f461d0b8119836bf5ebe2965975a122dad23594513582c0230c8aaa0aab804221b22e66dbec6097a1de177bd5c0eba001cc0b9204eba638ac10299aabe5666ad6508399a8a030169b252b92950f248992031a524397a49a852e20ab28f8e5beeaada117124a0d853caaf31de5678dfd33fb2373504194a3cfe89e22cba0ba9d50c54f3eaa172b22042e514814c546e58c30b4db2db35595f45c7ed37276e39ab30eb26cccbfb4df3fcad464ca0a7a92d3677ef8ab481e145574824d3277d555c53ba3363fe9238968ccd26a2c9fc3958a069ea6e8a125d45a28490bb83c11ec9d55f129227a012c8488888a06228b6140c4fc4a37481738957e2350e68bb733a8b1b104660dd15d998639ea099470c45b91787e9ed019786a6ebb31c916b604f40550ab267a3ea5caa2a5e9e280d8def1242f12eaaf125c8d384442e4284f054872cda50b28b3da7aaec32a6d41d0f508aec0fa0a90dd42e4e2531cac40610a27290951c8e005c9b00b18615187594b49332469e170363b6de2a395b658c991cccf882a7c5ec784efa156c1f655f8cc638411cd60a1943a05651aadc3ce415b44b9e474c7a3ad6a786a7809129024b0bd16c915735ea66beeb0c1c64513d80eaa2122e3a5580c9b8c01640cf326cf32ad9ea53288ad8eaa9955cafba7cb2dd4987d2191d6f8466e3d39789568a27260bc2bab502a1a3200586434d0249c9591c3235e2ed37091c96770aadee8e77b15a4e20e1769b82a7287165213524722913a67e5e610b23acbad25c401cd0416cb4e24262b57dd465e05ce80753cd4bc484c5a32f8c81a820aa902b70ec7f89dc32002fa11a79dd32aaa1d3bb8597e1be5d7aa0e8e8f8cd9e5b1b45cf13b200ee3a936d14ccc5d918e1801be85e753e0364cd7a059d103e966b9f649b122fab4f45a5710f1d563648a79dd700f8bb216f15a40d2c0d17b90d19fc96604c52b6daaafc445d87a66ad7883c7541cf1ea0a14326565048ae217aa08bd9711c8ab4a7954668e984b45b35cba4a1592a7f7aa54359d7a689131f2285d2a648d615dfa63aa102f9942f991510361151508026e9c4a969295d2bb8583c4ec0732a8908d8ca7a773dc1ad199f403995745a23688d9e677279a978590378199b8ea7727f0ababeb1b0b0bdd99d86e4a7488ca564fdd24b10fc6a6249ef08b9390d924fc189c917d1b0106e115814a6e45f2e4924b64fc418ff20eac52e0a3dbff00c7f0ba92e73a1f41d5c33079a8d8571254448cb76c267199e2f90390190190d00517664fb4e1d0fd42492b3e89aecd33067e4bb53b782e24a6302b8d8e4a79fdd492582506202cf52d3949253917c61ac2a4695d494cab1b21434852491429038a65d2493a14692b5cd8c47100c1c390396e4f35d49322532ae2373739ac77696673a67026e0580e992492a47b26fa2a1249255267ffd9),
(15, 'nom0', 'prenom0', 'email0', 'password0', 0, 'ent0', 'fnc0', 0x31),
(16, 'nom0', 'prenom0', 'email0', 'password0', 0, 'ent0', 'fnc0', 0x31),
(17, 'nom1', 'prenom1', 'email1', 'password1', 1, 'ent1', 'fnc1', 0x31),
(18, 'nom2', 'prenom2', 'email2', 'password2', 2, 'ent2', 'fnc2', 0x31),
(19, 'nom3', 'prenom3', 'email3', 'password3', 3, 'ent3', 'fnc3', 0x31),
(20, 'nom4', 'prenom4', 'email4', 'password4', 4, 'ent4', 'fnc4', 0x31),
(21, 'nom5', 'prenom5', 'email5', 'password5', 5, 'ent5', 'fnc5', 0x31),
(22, 'nom6', 'prenom6', 'email6', 'password6', 6, 'ent6', 'fnc6', 0x31),
(23, 'nom7', 'prenom7', 'email7', 'password7', 7, 'ent7', 'fnc7', 0x31),
(24, 'nom8', 'prenom8', 'email8', 'password8', 8, 'ent8', 'fnc8', 0x31),
(25, 'nom9', 'prenom9', 'email9', 'password9', 9, 'ent9', 'fnc9', 0x31),
(26, 'nom10', 'prenom10', 'email10', 'password10', 10, 'ent10', 'fnc10', 0x31),
(27, 'nom11', 'prenom11', 'email11', 'password11', 11, 'ent11', 'fnc11', 0x31),
(28, 'nom12', 'prenom12', 'email12', 'password12', 12, 'ent12', 'fnc12', 0x31),
(29, 'nom13', 'prenom13', 'email13', 'password13', 13, 'ent13', 'fnc13', 0x31),
(30, 'nom14', 'prenom14', 'email14', 'password14', 14, 'ent14', 'fnc14', 0x31),
(31, 'nom15', 'prenom15', 'email15', 'password15', 15, 'ent15', 'fnc15', 0x31),
(32, 'nom16', 'prenom16', 'email16', 'password16', 16, 'ent16', 'fnc16', 0x31),
(33, 'nom17', 'prenom17', 'email17', 'password17', 17, 'ent17', 'fnc17', 0x31),
(34, 'nom18', 'prenom18', 'email18', 'password18', 18, 'ent18', 'fnc18', 0x31),
(35, 'nom19', 'prenom19', 'email19', 'password19', 19, 'ent19', 'fnc19', 0x31),
(36, 'nom20', 'prenom20', 'email20', 'password20', 20, 'ent20', 'fnc20', 0x31),
(37, 'nom21', 'prenom21', 'email21', 'password21', 21, 'ent21', 'fnc21', 0x31),
(38, 'nom22', 'prenom22', 'email22', 'password22', 22, 'ent22', 'fnc22', 0x31),
(39, 'nom23', 'prenom23', 'email23', 'password23', 23, 'ent23', 'fnc23', 0x31),
(40, 'nom24', 'prenom24', 'email24', 'password24', 24, 'ent24', 'fnc24', 0x31),
(41, 'nom25', 'prenom25', 'email25', 'password25', 25, 'ent25', 'fnc25', 0x31),
(42, 'nom26', 'prenom26', 'email26', 'password26', 26, 'ent26', 'fnc26', 0x31),
(43, 'nom27', 'prenom27', 'email27', 'password27', 27, 'ent27', 'fnc27', 0x31),
(44, 'nom28', 'prenom28', 'email28', 'password28', 28, 'ent28', 'fnc28', 0x31),
(45, 'nom29', 'prenom29', 'email29', 'password29', 29, 'ent29', 'fnc29', 0x31),
(46, 'nom30', 'prenom30', 'email30', 'password30', 30, 'ent30', 'fnc30', 0x31),
(47, 'nom31', 'prenom31', 'email31', 'password31', 31, 'ent31', 'fnc31', 0x31),
(48, 'nom32', 'prenom32', 'email32', 'password32', 32, 'ent32', 'fnc32', 0x31),
(49, 'nom33', 'prenom33', 'email33', 'password33', 33, 'ent33', 'fnc33', 0x31),
(50, 'nom34', 'prenom34', 'email34', 'password34', 34, 'ent34', 'fnc34', 0x31),
(51, 'nom35', 'prenom35', 'email35', 'password35', 35, 'ent35', 'fnc35', 0x31),
(52, 'nom36', 'prenom36', 'email36', 'password36', 36, 'ent36', 'fnc36', 0x31),
(53, 'nom37', 'prenom37', 'email37', 'password37', 37, 'ent37', 'fnc37', 0x31),
(54, 'nom38', 'prenom38', 'email38', 'password38', 38, 'ent38', 'fnc38', 0x31),
(55, 'nom39', 'prenom39', 'email39', 'password39', 39, 'ent39', 'fnc39', 0x31),
(56, 'nom40', 'prenom40', 'email40', 'password40', 40, 'ent40', 'fnc40', 0x31),
(57, 'nom41', 'prenom41', 'email41', 'password41', 41, 'ent41', 'fnc41', 0x31),
(58, 'nom42', 'prenom42', 'email42', 'password42', 42, 'ent42', 'fnc42', 0x31),
(59, 'nom43', 'prenom43', 'email43', 'password43', 43, 'ent43', 'fnc43', 0x31),
(60, 'nom44', 'prenom44', 'email44', 'password44', 44, 'ent44', 'fnc44', 0x31),
(61, 'nom45', 'prenom45', 'email45', 'password45', 45, 'ent45', 'fnc45', 0x31),
(62, 'nom46', 'prenom46', 'email46', 'password46', 46, 'ent46', 'fnc46', 0x31),
(63, 'nom47', 'prenom47', 'email47', 'password47', 47, 'ent47', 'fnc47', 0x31),
(64, 'nom48', 'prenom48', 'email48', 'password48', 48, 'ent48', 'fnc48', 0x31),
(65, 'nom49', 'prenom49', 'email49', 'password49', 49, 'ent49', 'fnc49', 0x31),
(66, 'nom50', 'prenom50', 'email50', 'password50', 50, 'ent50', 'fnc50', 0x31),
(67, 'nom51', 'prenom51', 'email51', 'password51', 51, 'ent51', 'fnc51', 0x31),
(68, 'nom52', 'prenom52', 'email52', 'password52', 52, 'ent52', 'fnc52', 0x31),
(69, 'nom53', 'prenom53', 'email53', 'password53', 53, 'ent53', 'fnc53', 0x31),
(70, 'nom54', 'prenom54', 'email54', 'password54', 54, 'ent54', 'fnc54', 0x31),
(71, 'nom55', 'prenom55', 'email55', 'password55', 55, 'ent55', 'fnc55', 0x31),
(72, 'nom56', 'prenom56', 'email56', 'password56', 56, 'ent56', 'fnc56', 0x31),
(73, 'nom57', 'prenom57', 'email57', 'password57', 57, 'ent57', 'fnc57', 0x31),
(74, 'nom58', 'prenom58', 'email58', 'password58', 58, 'ent58', 'fnc58', 0x31),
(75, 'nom59', 'prenom59', 'email59', 'password59', 59, 'ent59', 'fnc59', 0x31),
(76, 'nom60', 'prenom60', 'email60', 'password60', 60, 'ent60', 'fnc60', 0x31),
(77, 'nom61', 'prenom61', 'email61', 'password61', 61, 'ent61', 'fnc61', 0x31),
(78, 'nom62', 'prenom62', 'email62', 'password62', 62, 'ent62', 'fnc62', 0x31),
(79, 'nom63', 'prenom63', 'email63', 'password63', 63, 'ent63', 'fnc63', 0x31),
(80, 'nom64', 'prenom64', 'email64', 'password64', 64, 'ent64', 'fnc64', 0x31),
(81, 'nom65', 'prenom65', 'email65', 'password65', 65, 'ent65', 'fnc65', 0x31),
(82, 'nom66', 'prenom66', 'email66', 'password66', 66, 'ent66', 'fnc66', 0x31),
(83, 'nom67', 'prenom67', 'email67', 'password67', 67, 'ent67', 'fnc67', 0x31),
(84, 'nom68', 'prenom68', 'email68', 'password68', 68, 'ent68', 'fnc68', 0x31),
(85, 'nom69', 'prenom69', 'email69', 'password69', 69, 'ent69', 'fnc69', 0x31),
(86, 'nom70', 'prenom70', 'email70', 'password70', 70, 'ent70', 'fnc70', 0x31),
(87, 'nom71', 'prenom71', 'email71', 'password71', 71, 'ent71', 'fnc71', 0x31),
(88, 'nom72', 'prenom72', 'email72', 'password72', 72, 'ent72', 'fnc72', 0x31),
(89, 'nom73', 'prenom73', 'email73', 'password73', 73, 'ent73', 'fnc73', 0x31),
(90, 'nom74', 'prenom74', 'email74', 'password74', 74, 'ent74', 'fnc74', 0x31),
(91, 'nom75', 'prenom75', 'email75', 'password75', 75, 'ent75', 'fnc75', 0x31),
(92, 'nom76', 'prenom76', 'email76', 'password76', 76, 'ent76', 'fnc76', 0x31),
(93, 'nom77', 'prenom77', 'email77', 'password77', 77, 'ent77', 'fnc77', 0x31),
(94, 'nom78', 'prenom78', 'email78', 'password78', 78, 'ent78', 'fnc78', 0x31),
(95, 'nom79', 'prenom79', 'email79', 'password79', 79, 'ent79', 'fnc79', 0x31),
(96, 'nom80', 'prenom80', 'email80', 'password80', 80, 'ent80', 'fnc80', 0x31),
(97, 'nom81', 'prenom81', 'email81', 'password81', 81, 'ent81', 'fnc81', 0x31),
(98, 'nom82', 'prenom82', 'email82', 'password82', 82, 'ent82', 'fnc82', 0x31),
(99, 'nom83', 'prenom83', 'email83', 'password83', 83, 'ent83', 'fnc83', 0x31),
(100, 'nom84', 'prenom84', 'email84', 'password84', 84, 'ent84', 'fnc84', 0x31),
(101, 'nom85', 'prenom85', 'email85', 'password85', 85, 'ent85', 'fnc85', 0x31),
(102, 'nom86', 'prenom86', 'email86', 'password86', 86, 'ent86', 'fnc86', 0x31),
(103, 'nom87', 'prenom87', 'email87', 'password87', 87, 'ent87', 'fnc87', 0x31),
(104, 'nom0', 'prenom0', 'email0', 'password0', 0, 'ent0', 'fnc0', 0x31),
(105, 'nom1', 'prenom1', 'email1', 'password1', 1, 'ent1', 'fnc1', 0x31),
(106, 'nom2', 'prenom2', 'email2', 'password2', 2, 'ent2', 'fnc2', 0x31),
(107, 'nom3', 'prenom3', 'email3', 'password3', 3, 'ent3', 'fnc3', 0x31),
(108, 'nom4', 'prenom4', 'email4', 'password4', 4, 'ent4', 'fnc4', 0x31),
(109, 'nom5', 'prenom5', 'email5', 'password5', 5, 'ent5', 'fnc5', 0x31),
(110, 'nom6', 'prenom6', 'email6', 'password6', 6, 'ent6', 'fnc6', 0x31),
(111, 'nom7', 'prenom7', 'email7', 'password7', 7, 'ent7', 'fnc7', 0x31),
(112, 'nom8', 'prenom8', 'email8', 'password8', 8, 'ent8', 'fnc8', 0x31),
(113, 'nom9', 'prenom9', 'email9', 'password9', 9, 'ent9', 'fnc9', 0x31);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_registrations`
--
ALTER TABLE `events_registrations`
  ADD CONSTRAINT `fk_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
