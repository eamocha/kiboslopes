DROP TABLE categories;

CREATE TABLE `categories` (
  `category_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `sequence` int(2) unsigned NOT NULL DEFAULT '1',
  `rpeat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `public` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `color` varchar(10) DEFAULT NULL,
  `background` varchar(10) DEFAULT NULL,
  `check1` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `label1` varchar(40) NOT NULL DEFAULT 'approved',
  `mark1` varchar(10) NOT NULL DEFAULT 'ok',
  `check2` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `label2` varchar(40) NOT NULL DEFAULT 'complete',
  `mark2` varchar(10) NOT NULL DEFAULT '&#10003;',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

INSERT INTO categories VALUES("1","EMANNUEL - CLASSIC","63","0","1","#0000CC","#00CC00","0","approved","ok","0","","?","0");
INSERT INTO categories VALUES("3","NOT ALLOCATED","0","0","1","#000066","#DDDDDD","1","Francis!!!","ok","0","","?","0");
INSERT INTO categories VALUES("4","CRISPUS  MACHARIA","41","0","1","#FFFFFF","#0000CC","1","KBV 179A","ok","1","+254722705910","?","0");
INSERT INTO categories VALUES("5","DUFTON KATINI","42","0","1","#FFFFFF","#0000FF","1","KBV 940G","OK","1","+254722705824","?","0");
INSERT INTO categories VALUES("6","JUMA BINDO","43","0","1","#FFFFFF","#0000FF","1","KBV 180A","ok","1","+254721237198","?","0");
INSERT INTO categories VALUES("7","MATHIAS MULANDA","45","0","1","#FFFFFF","#0000FF","1","KAV 510X","ok","1","+254723632415","?","0");
INSERT INTO categories VALUES("8","JAMAL TOROME","44","0","1","#FFFFFF","#0000FF","1","KBN 224 A","ok","1","+254722780505","?","0");
INSERT INTO categories VALUES("9","THOMAS CHENGO","46","0","1","#FFFFFF","#0000FF","1","KBN  219A","ok","1","+254716877185","?","0");
INSERT INTO categories VALUES("10","BEN MILULU","0","0","1","#333333","#FFFFFF","1","KAP 489 C","ok","1","+254722430217","?","-1");
INSERT INTO categories VALUES("11","CHARLES CHEGE","47","0","1","#FFFFFF","#0000FF","1","KBQ 114C","ok","1","+254723547580","?","0");
INSERT INTO categories VALUES("12","STEPHEN GITAU","49","0","1","#FFFFFF","#000000","0","","ok","1","+254721548095","?","0");
INSERT INTO categories VALUES("13","Hire - Dick","0","0","1","","#FFFFFF","0","","ok","0","","?","-1");
INSERT INTO categories VALUES("14","Hire - Tom","0","0","1","","#FFFFFF","0","","ok","0","","?","-1");
INSERT INTO categories VALUES("15","Hire - Harry","0","0","1","","#FFFFFF","0","","ok","0","","?","-1");
INSERT INTO categories VALUES("16","ALEX NGUMO","99","0","1","#000000","#00FF00","1","MT. GUIDE","ok","1","+254722705697","?","0");
INSERT INTO categories VALUES("17","CHARLES MSAKI","52","0","1","#FFFFFF","#009900","1","T 546 CDE","ok","1","+255756332343","?","0");
INSERT INTO categories VALUES("18","HUBERT TENGA","57","0","1","#FFFFFF","#009900","1","T 481 BRS","ok","1","+255784501133","?","0");
INSERT INTO categories VALUES("19","EDWARD SIRI","54","0","1","#FFFFFF","#009900","1","T 408 AKU","SHORT","1","+255784360994","?","0");
INSERT INTO categories VALUES("20","MOHAMED - MARHABA","29","0","1","#FFFFFF","#9999FF","1","KBK 710X","ok","1","0722256360","?","0");
INSERT INTO categories VALUES("21","FRANCIS","0","0","1","","","0","","ok","0","","?","-1");
INSERT INTO categories VALUES("22","NOT ALLOCATED","1","0","1","","","1","Francis!!!","ok","0","","?","0");
INSERT INTO categories VALUES("23","IMPALA SHUTTLE","127","0","1","#FF0000","#FFFF00","0","","ok","0","","?","0");
INSERT INTO categories VALUES("24","OWN ARRANGEMENT","130","0","1","#000000","#FFFFFF","0","","ok","0","","?","0");
INSERT INTO categories VALUES("25","DEOGRATIOUS","117","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1","+255 684 733 328","?","0");
INSERT INTO categories VALUES("26","KIBO S. COTTAGES","125","0","1","#FF0000","#FFFF00","0","","ok","0","+254729308767","?","0");
INSERT INTO categories VALUES("27","TENGA","0","0","1","#FFFFFF","#00FF00","0","","ok","0","","?","-1");
INSERT INTO categories VALUES("28","ZEBEDAYO KILEO","107","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1"," 255 754 759419","?","0");
INSERT INTO categories VALUES("29","TAXI","121","0","1","#FF0000","#FFFF00","0","","ok","0","","?","0");
INSERT INTO categories VALUES("30","FARAJA NGOMUO","108","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1"," 255 686 242096","✓","0");
INSERT INTO categories VALUES("31","ABU BAKER","30","0","1","#FFFFFF","#9999FF","1","KAW 383 C","ok","1","+254724386966","✓","0");
INSERT INTO categories VALUES("32","FAZA FREDRICK","110","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1","+255757092876","✓","0");
INSERT INTO categories VALUES("33","SALIM - ZANZIBAR","123","0","1","#FF0000","#FFFF00","0","","ok","0","+255 777 421 199","✓","0");
INSERT INTO categories VALUES("34","NICHOLAS NDERITU","103","0","1","#000000","#33FF33","1","MT. GUIDE","ok","1","0722177787","✓","0");
INSERT INTO categories VALUES("35","JOHANNA SALIM","31","0","1","#FFFFFF","#9999FF","0","","ok","1","0718 559 993","✓","0");
INSERT INTO categories VALUES("36","GAUDENCE SHIRIMA","111","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1"," 255 756 984799","✓","0");
INSERT INTO categories VALUES("37","OMARI MGENI","74","0","1","#0000FF","#00CC00","0","T 318 BQZ","ok","0","+ 255 751 585 722","✓","0");
INSERT INTO categories VALUES("38","RAMADHANI KAMBI","106","0","1","#000000","#FF99FF","0","MT. GUIDE","ok","1"," 255 787 148530","✓","0");
INSERT INTO categories VALUES("39","SEVERIN LUSULO","105","0","1","#000000","#FF99FF","0","MT. GUIDE","ok","1"," 255 755 164451","✓","0");
INSERT INTO categories VALUES("40","SIMON CHEGE","102","0","1","#000000","#00FF00","0","MT. GUIDE","ok","0","","✓","0");
INSERT INTO categories VALUES("41","KIHARA","109","0","1","#000000","#FF99FF","0","MT. GUIDE","ok","0","","✓","0");
INSERT INTO categories VALUES("42","DAVID MUGO","101","0","1","#000000","#00FF00","0","MT. GUIDE","ok","0","","✓","0");
INSERT INTO categories VALUES("43","MOHAMED H","38","0","1","#FFFFFF","#9999FF","1","Kay 599 X","ok","1","+254710865871","✓","0");
INSERT INTO categories VALUES("44","ADAN HUSSEIN","33","0","1","#FFFFFF","#9999FF","0","","ok","1","+25722306984","✓","0");
INSERT INTO categories VALUES("45","ALI","120","0","1","#0000CC","#AAAAAA","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("46","BEACH  - STAY PUT","129","0","1","#3333FF","#FFD9A8","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("47","DANIEL MUGO","100","0","1","#000000","#00FF00","0","MT. GUIDE","ok","1","+254721164071","✓","0");
INSERT INTO categories VALUES("48","JAMES MUGANE","25","0","1","#FFFFFF","#9999FF","0","","ok","1","+254722993752","✓","0");
INSERT INTO categories VALUES("49","AHAMED MOHAMED IZAK","40","0","1","#FFFFFF","#0000CC","1","KBQ 671C","ok","1","0722 390 742","✓","0");
INSERT INTO categories VALUES("50","MUSTAFA MOHAMUD","0","0","1","#FFFFFF","#0000FF","0","Kibo Slopes","ok","1","0720805857","✓","-1");
INSERT INTO categories VALUES("51","JAMES MUNGANE","36","0","1","#FFFFFF","#9999FF","1","KBR 189B","ok","1","0722993752","✓","0");
INSERT INTO categories VALUES("52","WYCLIFFE SAGALA","32","0","1","#FFFFFF","#9999FF","1","KAL 586 M","ok","1","0720 631244","✓","0");
INSERT INTO categories VALUES("53","FREDRICK NYANGE","28","0","1","#FFFFFF","#9999FF","1","KAX 999K","ok","1","0721 796 672  ","✓","0");
INSERT INTO categories VALUES("54","MUSA MOSES","27","0","1","#FFFFFF","#9999FF","0","","ok","1","+254719381519","✓","0");
INSERT INTO categories VALUES("55","JAMES MLANA","24","0","1","#FFFFFF","#9999FF","1","T975ATC","ok","1","+255783688911","✓","0");
INSERT INTO categories VALUES("56","JULIUS BIRIR","22","0","1","#FFFFFF","#9999FF","1","KAL 901 B","ok","1","0713963898","✓","0");
INSERT INTO categories VALUES("57","ISSA JUMA","55","0","1","#FFFFFF","#009900","1","T 410 AKU","ok","1"," +255 785 236080","✓","0");
INSERT INTO categories VALUES("58","PETER MWANGU","26","0","1","#FFFFFF","#9999FF","1","KBP 477H","ok","1","0728782958","✓","0");
INSERT INTO categories VALUES("59","JAMAL MENDEZ","21","0","1","#FFFFFF","#9999FF","1","KAZ 733 L","ok","1","0721528853","✓","0");
INSERT INTO categories VALUES("60","Eric Atinga","0","0","1","#FEA838","#006600","0","KBJ 4354j","0","0","07342225254","✓","-1");
INSERT INTO categories VALUES("61","JOSEPH NG\'ANGA","20","0","1","#FFFFFF","#9999FF","1","KAU 807 G","ok","1","0721113256","✓","0");
INSERT INTO categories VALUES("62","ABUBAKER YAHYA","19","0","1","#FFFFFF","#9999FF","1","0735759137","ok","1","0715280100","✓","0");
INSERT INTO categories VALUES("63","MT GUIDE-SNOWCAP","119","0","1","","","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("64","JUMA SAID","17","0","1","#FFFFFF","#9999FF","0","","ok","1","0723988874","✓","0");
INSERT INTO categories VALUES("65","ALLAN","0","0","1","#000000","#BBBBFF","0","","ok","1","0721560419","✓","-1");
INSERT INTO categories VALUES("66","ALLAN","18","0","1","#FFFFFF","#9999FF","0","","ok","1","0721560419","✓","0");
INSERT INTO categories VALUES("67","PETER KIRUI","16","0","1","#FFFFFF","#9999FF","1","KAW 976 Z","ok","1","0721304588","✓","0");
INSERT INTO categories VALUES("68","SAID THOYA","15","0","1","#FFFFFF","#9999FF","0","","ok","1"," 0724241884","✓","0");
INSERT INTO categories VALUES("69","HASSAN SAIDI","13","0","1","#FFFFFF","#9999FF","1","KAW 4388","ok","1","0721 982752","✓","0");
INSERT INTO categories VALUES("70","DAVID CHARLES","68","0","1","#0000FF","#00CC00","1","T 718 BVQ","ok","1","+255 784 648160","✓","0");
INSERT INTO categories VALUES("71","EZEKIAL MALONGOZA","78","0","1","#0000CC","#00CC00","1"," T 331 AHS","ok","1","+255787 595352","✓","0");
INSERT INTO categories VALUES("72","KARUME TLUWEUI","75","0","1","#0000CC","#00CC00","1","T 614 ADC","ok","1","768 102142","✓","0");
INSERT INTO categories VALUES("73","JUSTIN STEPHEN","94","0","1","#0000CC","#00CC00","1","T 863 BLP","ok","1","+255767 299342","✓","0");
INSERT INTO categories VALUES("74","RAMADHANI NTOGA","76","0","1","#0000FF","#00CC00","1","T 137 BFV ","ok","1","+255 765 455030","✓","0");
INSERT INTO categories VALUES("75","JOHN RUNANA","104","0","1","#000000","#00FF00","1","BICYCLE GUIDE","ok","0","0722 218 165","✓","0");
INSERT INTO categories VALUES("76","JOSEPH KIMARU","23","0","1","#FFFFFF","#9999FF","0","","ok","1","0729 160 642","✓","0");
INSERT INTO categories VALUES("77","MARHABA TOURS MOMBASA","124","0","1","#FF0000","#FFFF00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("78","DAN ACHOKA","12","0","1","#FFFFFF","#9999FF","0","","ok","1","0722 116 286","✓","0");
INSERT INTO categories VALUES("79","STARNELY MBISE","0","0","1","#FFFFFF","#009900","0","","ok","0","","✓","-1");
INSERT INTO categories VALUES("80","CASTOR MASAWE","56","0","1","#FFFFFF","#009900","1","T 410 AKU","SHORT","0","","✓","0");
INSERT INTO categories VALUES("81","STANLEY MBISE","112","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1","255766766377","✓","0");
INSERT INTO categories VALUES("82","SALIM MBAGA","116","0","1","#000000","#FF99FF","1","MT. GUIDE","ok","1","+255767634000","✓","0");
INSERT INTO categories VALUES("83","MATHEW","8","0","1","#FFFFFF","#9999FF","0","","ok","1","+254738279208","✓","0");
INSERT INTO categories VALUES("84","PETER N\'GENO","4","0","1","#FFFFFF","#9999FF","0","","ok","1","0734417540","✓","0");
INSERT INTO categories VALUES("85","ABEL SEBASTIAN","58","0","1","#0000FF","#00CC00","1","T27ACY ","ok","1","+255787225483","✓","0");
INSERT INTO categories VALUES("86","GROUND PACKAGE","126","0","1","#FF0000","#FFFF00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("87","AMANI","72","0","1","#0000FF","#00CC00","0","","ok","1","+255782476666","✓","0");
INSERT INTO categories VALUES("88","KARIM URASA","73","0","1","#0000CC","#00CC00","1","T886AEG","ok","1","+255768022526","✓","0");
INSERT INTO categories VALUES("89","PRIVATE SHUTTLE","128","0","1","#FF0000","#FFFF00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("90","HOTEL TAXI","122","0","1","#FF0000","#FFFF00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("91","JOSEPH MAPINA","118","0","1","#000000","#FF99FF","1","Mt. Guide","ok","1","+255762777958","✓","0");
INSERT INTO categories VALUES("92","WILLI NDAKA","34","0","1","#FFFFFF","#9999FF","1","MINI VAN","ok","1","+254720235884","✓","0");
INSERT INTO categories VALUES("93","ALI KASSIM FUMBWE","37","0","1","#FFFFFF","#9999FF","1","KAY 112H","ok","1","+254721535130","✓","0");
INSERT INTO categories VALUES("94","SAMMY KAGWI","35","0","1","#FFFFFF","#9999FF","1","KBP 368A","ok","1","+254722888937","✓","0");
INSERT INTO categories VALUES("95","ALLY JUMA","67","0","1","#0000CC","#00CC00","0","","ok","1","+255684816387","✓","0");
INSERT INTO categories VALUES("96","NIXON","60","0","1","#0000FF","#00CC00","0","","ok","1"," +255758980189","✓","0");
INSERT INTO categories VALUES("97","DAVID TEMBO","79","0","1","#0000CC","#00CC00","0","","ok","1","+255769778360","✓","0");
INSERT INTO categories VALUES("98","KENYATTA","14","0","1","#FFFFFF","#9999FF","0","","ok","1","0722807176","✓","0");
INSERT INTO categories VALUES("99","ANDREA MNDEME","87","0","1","#000099","#00CC00","0","","ok","1","+255757379546","✓","0");
INSERT INTO categories VALUES("100","JAMES MLANA","86","0","1","#0000CC","#00CC00","0","","ok","1","+255 783688911","✓","0");
INSERT INTO categories VALUES("101","BENSON LAIZER","82","0","1","#0000CC","#00CC00","0","","ok","1","+255755245838","✓","0");
INSERT INTO categories VALUES("102","ELI FURAHA","81","0","1","#0000CC","#00CC00","0","","ok","1","+255756542389","✓","0");
INSERT INTO categories VALUES("103","JUMA ABDALLAH","80","0","1","#0000CC","#00CC00","0","","ok","1","+255 767031460","✓","0");
INSERT INTO categories VALUES("104","VITALIS","53","0","1","#FFFFFF","#009900","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("105","DANIEL COSMAS","71","0","1","#0000FF","#00CC00","0","","ok","1","+255764002106","✓","0");
INSERT INTO categories VALUES("106","NICO","77","0","1","#0000FF","#00CC00","0","","ok","1"," 0754745542","✓","0");
INSERT INTO categories VALUES("107","SALIM HIRIRO","113","0","1","#333333","#FF99FF","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("108","BEN OBANDA - KAKAMEGA","51","0","1","#FFFFFF","#000000","0","","ok","1","0723934476","✓","0");
INSERT INTO categories VALUES("109","MASAWE","61","0","1","#3333FF","#00CC00","0","","ok","1","+2550757278720","✓","0");
INSERT INTO categories VALUES("110","MARIKI UNDERSON","70","0","1","#0000FF","#00CC00","0","","ok","1","+255767926969","✓","0");
INSERT INTO categories VALUES("111","OBUYA WYCLIFFE","2","0","1","#FFFFFF","#9999FF","1","KBC 409 S","ok","0","+254 723 932 974","✓","0");
INSERT INTO categories VALUES("112","JACKSON MAINA","11","0","1","#FFFFFF","#9999FF","0","","ok","1","+254700012344","✓","0");
INSERT INTO categories VALUES("113","AMANI WILFRED","62","0","1","#0000FF","#00CC00","0","","ok","1","+255784666848","✓","0");
INSERT INTO categories VALUES("114","GEORGE WACHIRA","5","0","1","#FFFFFF","#9999FF","0","KAR 457","ok","1","0722717520","✓","0");
INSERT INTO categories VALUES("115","FRANCIS MAINA","7","0","0","#FFFFFF","#9999FF","1","KAP 253 A","ok","1","0707353909","✓","0");
INSERT INTO categories VALUES("116","MOHAMED CHEMBERA","50","0","1","#FFFFFF","#000000","0","","ok","1","+255784282033","✓","0");
INSERT INTO categories VALUES("117","JESSIE NJOROGE","6","0","1","#FFFFFF","#9999FF","0","","ok","1","+254722614572","✓","0");
INSERT INTO categories VALUES("118","RONALD MUCHAI","0","0","1","#FFFFFF","#9999FF","0","","ok","1","+254722837419","✓","-1");
INSERT INTO categories VALUES("119","test","0","0","1","#009900","#009900","1","GHT","ok","1","6653434","✓","-1");
INSERT INTO categories VALUES("120","SALIM MULIRO","114","0","1","#000000","#FFBBFF","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("121","LODGE GAME PACKAGE","39","0","1","#FF0000","#FFD9A8","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("122","REAGAN JOHN","115","0","1","#333333","#FFBBFF","1","MT. GUIDE","ok","1","+255 767883 689","✓","0");
INSERT INTO categories VALUES("123","HASSAN TZ(HIRE)","69","0","1","#0000FF","#00CC00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("124","MARTIN (Rwanda)","96","0","1","#5555FF","#FFD9A8","0","","ok","1","25078850154","✓","0");
INSERT INTO categories VALUES("125","KENAN - Uganda","97","0","1","#5555FF","#FFCC89","0","","ok","1","+256 772 512990","✓","0");
INSERT INTO categories VALUES("126","MAKUMI - Uganda","98","0","1","#0000FF","#FFCC89","1","+256 782 325277","ok","0","","✓","0");
INSERT INTO categories VALUES("127","JOHN MUSOMBA","3","0","1","#FFFFFF","#9999FF","1","KAR 964  P","ok","1","0721220518","✓","0");
INSERT INTO categories VALUES("128","AMIRI SUFIANA","92","0","1","#0000FF","#00CC00","0","","ok","1","+255787707170","✓","0");
INSERT INTO categories VALUES("129","DANNY MWAMBA","93","0","1","#0000FF","#00CC00","0","","ok","1","+255784276115","✓","0");
INSERT INTO categories VALUES("130","EMANUEL MELAU","91","0","1","#0000FF","#00CC00","0","","ok","1","+255788664110","✓","0");
INSERT INTO categories VALUES("131","ANREA MDEME","88","0","1","#3333FF","#00CC00","0","","ok","1","+255757379546","✓","0");
INSERT INTO categories VALUES("132","HOSIANA URIO","90","0","1","#0000FF","#00CC00","0","","ok","1","+255759201056","✓","0");
INSERT INTO categories VALUES("133","GASPER MOSES","89","0","1","#3333FF","#00CC00","1","T 297 AAY","ok","1","+255752880110","✓","0");
INSERT INTO categories VALUES("134","HASSAN ABDALLA","9","0","1","#000000","#FFCCFF","0","","ok","1","+ 255","✓","0");
INSERT INTO categories VALUES("135","NIMROD WILSON","66","0","1","#3333FF","#00CC00","1","T6768ABX","ok","1","+255658016116","✓","0");
INSERT INTO categories VALUES("136","KENNETH OLUNANA","48","0","1","#FFFFFF","#5555FF","1","KAK 946 C","ok","1","0721647869","✓","0");
INSERT INTO categories VALUES("137","HURUMA SIMON","85","0","1","#0000FF","#00CC00","1","T 174 AET","ok","1","+255767417767 ","✓","0");
INSERT INTO categories VALUES("138","ERNEST METILI","84","0","1","#0000FF","#00CC00","1","T 192 BZK","ok","1","+255768608820 ","✓","0");
INSERT INTO categories VALUES("139","JOSHUA MONAH","83","0","1","#0000FF","#00CC00","1","T 796 AGQ","ok","1","+ 255 767 950 545 ","✓","0");
INSERT INTO categories VALUES("140","AGOSTINO NGOWI","10","0","1","#333333","#FF99FF","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("141","JOSHUA MONAH","64","0","1","#0000FF","#00CC00","1","T 796 AGQ","ok","1","+ 255 767 950 545 ","✓","0");
INSERT INTO categories VALUES("142","ZAKAYO SULEIMAN","65","0","1","#3333FF","#00CC00","0","","ok","0","","✓","0");
INSERT INTO categories VALUES("143","SAMWEL EMEE","59","0","1","#0000CC","#00CC00","1","T 841 AJK","ok","1","+255786477828 ","✓","0");
INSERT INTO categories VALUES("144","ROOTS TRAVEL","95","0","1","#0000FF","#FFBBBB","0","","ok","0","","✓","0");

DROP TABLE events;

CREATE TABLE `events` (
  `event_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `event_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `category_id` int(4) unsigned NOT NULL DEFAULT '1',
  `venue` varchar(64) DEFAULT NULL,
  `user_id` int(6) unsigned DEFAULT NULL,
  `editor` varchar(32) NOT NULL DEFAULT '',
  `private` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked` text,
  `s_date` date DEFAULT NULL,
  `e_date` date NOT NULL DEFAULT '9999-00-00',
  `x_dates` text,
  `s_time` time DEFAULT NULL,
  `e_time` time NOT NULL DEFAULT '99:00:00',
  `r_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `r_interval` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `r_period` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `r_month` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `r_until` date NOT NULL DEFAULT '9999-00-00',
  `notify` tinyint(1) NOT NULL DEFAULT '-1',
  `not_mail` varchar(255) DEFAULT NULL,
  `a_date` date NOT NULL DEFAULT '9999-00-00',
  `m_date` date NOT NULL DEFAULT '9999-00-00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `itinerary_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5819 DEFAULT CHARSET=utf8;

INSERT INTO events VALUES("23","0","04-13 RAIFFE GD","Half day Crater Tour, drive to Arusha with a picnic box.","3","-","1","","0","","2013-04-20","2013-04-20","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-04-17","-1","153","");
INSERT INTO events VALUES("24","0","04-13 RAIFFE GD","Drive via Namanga to Amboseli for lunch.","3","-","1","","0","","2013-04-21","2013-04-21","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-04-17","-1","154","");
INSERT INTO events VALUES("25","0","04-13 RAIFFE GD","Full day game drives, visit Maasai village. Overnight Amboseli Serena","3","-","1","","0","","2013-04-22","2013-04-22","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-04-17","-1","155","");
INSERT INTO events VALUES("26","0","04-13 RAIFFE GD","Breakfast, check for transfer to departure in Nairobi QR 533","3","-","1","","0","","2013-04-23","2013-04-23","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-04-17","-1","156","");
INSERT INTO events VALUES("27","0","06-26 TZ ADV PEARSON","Pick up JKIA  and transfer to Stanley Hotel","5","MEET & GREET / TRANSFER","1","eric atinga","0","","2013-06-26","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-07-03","-1","157","");
INSERT INTO events VALUES("28","0","06-26 TZ ADV PEARSON","Vehicle disposal in Nairobi with driver/guide O/N Stanley hotel","5","-","1","eric atinga","0","","2013-06-27","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-25","0","158","");
INSERT INTO events VALUES("29","0","06-26 TZ ADV PEARSON","Drive to Aberdare, lunch aberdare country club and transfer with lodge vehicle to Aberdare park","5","-","1","eric atinga","0","","2013-06-28","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-25","0","159","");
INSERT INTO events VALUES("30","0","06-26 TZ ADV PEARSON","After breakfast drive to Nakuru, game drives, O/N","5","-","1","eric atinga","0","","2013-06-29","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-25","0","160","");
INSERT INTO events VALUES("31","0","06-26 TZ ADV PEARSON","Drive to Maasai Mara Via Naivasha with early lunch at Elsamere Conservancy and  proceed  to Maasai Mara, O/N Mara Serena","5","-","1","eric atinga","0","","2013-06-30","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-25","0","161","");
INSERT INTO events VALUES("32","0","06-26 TZ ADV PEARSON","Maasai Mara game drives","5","-","1","eric atinga","0","","2013-07-01","9999-00-00","","14:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-06-25","0","162","");
INSERT INTO events VALUES("33","0","06-26 TZ ADV PEARSON","Drive to Isebania (please booked packed lunch for this day. Hand over to Tanzania Agent (Details?)","5","-","1","eric atinga","0","","2013-07-02","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-25","0","163","");
INSERT INTO events VALUES("35","0","deleted","Inflight","9","-","1","jackson","0","","2013-05-04","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-03-14","-1","0","");
INSERT INTO events VALUES("36","0","05-04 RAIFFE GD","","9","Nairobi to Mara","1","Joel Mwakio","0","","2013-05-05","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-04-22","-1","0","");
INSERT INTO events VALUES("37","0","05-04 RAIFFE GD","Drive to Maasai Mara,lunch, PM game drives.","9","-","1","jackson","0","","2013-05-06","2013-05-08",";2013-05-06","00:00:00","23:59:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-04-22","-1","0","");
INSERT INTO events VALUES("38","0","05-04 RAIFFE GD","Full day Maasai Mara,Morning &amp; PM game drives.","4","-","1","jackson","0","","2013-05-07","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-03-12","-1","0","");
INSERT INTO events VALUES("39","0","05-04 RAIFFE GD","Drive Via Isebania with picnic lunch box to Spekebay.","4","-","1","jackson","0","","2013-05-08","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-03-12","-1","0","");
INSERT INTO events VALUES("40","0","05-04 RAIFFE GD","Drive to Serengeti, with picnic box. Game drives en-route to lodge.","4","-","1","jackson","0","","2013-05-09","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-03-12","0","0","");
INSERT INTO events VALUES("41","0","05-04 RAIFFE GD","Serengeti game drives,after lunch drive to Ngorongoro,FB Wildlife Lodge","3","-","1","","0","","2013-05-10","2013-05-10","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","0","");
INSERT INTO events VALUES("42","0","05-04 RAIFFE GD","6hours crater tour and after lunch drive to Arusha. Dinner & overnight.","3","-","1","","0","","2013-05-11","2013-05-11","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","0","");
INSERT INTO events VALUES("43","0","05-04 RAIFFE GD","Amboseli Via Namanga, game drives en-route to late lunch.","3","-","1","","0","","2013-05-12","2013-05-12","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","0","");
INSERT INTO events VALUES("44","0","05-04 RAIFFE GD","Amboseli game drives, visit Maasai Village.","3","-","1","","0","","2013-05-13","2013-05-13","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","0","");
INSERT INTO events VALUES("45","0","05-04 RAIFFE GD","Leave at 8.00am for Nairobi, optional lunch on the way,depature at 18.00h, QR533 or extended  to  Mombasa.","3","-","1","","0","","2013-05-14","2013-05-14","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","0","");
INSERT INTO events VALUES("46","0","06-06 MARIKA & JUSSI","Morning arrival and drive to Maasai Mara, Lunch seasons, Gamedrives, FB Mara Ashnil","9","2013-06-06-RESIDENCE","2","eric atinga","0","","2013-06-06","9999-00-00","","00:08:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinnga@yahoo.com","9999-00-00","2013-06-06","0","176","");
INSERT INTO events VALUES("47","0","06-06 MARIKA & JUSSI","Full day Maasai Mara game drives, FB Mara Ashnil","9","-","1","eric atinga","0","","2013-06-07","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-06","0","177","");
INSERT INTO events VALUES("48","0","06-06 MARIKA & JUSSI","Morning game drives. Leave with a picnic lunch box, to Nairobi- End of service.","9","-","1","eric atinga","0","","2013-06-08","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-06-06","0","178","");
INSERT INTO events VALUES("49","0","06-10 PIC MR LU JIADONG","Pick up Airport 1245h, visit Giraffe center and animal orphanage then transfer to Safari park Hotel.","6","-","1","Francis Matano","0","","2013-06-10","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","179","");
INSERT INTO events VALUES("50","0","06-10 PIC MR LU JIADONG","0700 - drive Naivasha , stop at Rift Valley, boat ride &amp; walking safari on own arrangement, then transfer to Bogoria via equator, afternoon game drives","1","-","1","Jackson","0","","2013-06-11","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-06-24","-1","181","");
INSERT INTO events VALUES("51","0","06-10 PIC MR LU JIADONG","Early morning departure to Naivasha , stop at Rift Valley, Naivasha optional excursions, proceed to Bogoria, Lunch &amp; afternoon game drives.","6","-","1","Francis Matano","0","","2013-06-11","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","181","");
INSERT INTO events VALUES("52","0","06-10 PIC MR LU JIADONG","Bogoria game drives, proceed to Lake Nakuru, for Lunch Lionhill, FB Lake Nakuru Lodge","6","-","1","Francis Matano","0","","2013-06-12","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","182","");
INSERT INTO events VALUES("53","0","06-10 PIC MR LU JIADONG","Morning drive to Maasai mara , hot lunch Ashnil Camp, afternoon gamedrives, FB Mara Ashnil Camp","6","-","1","Francis Matano","0","","2013-06-13","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","183","");
INSERT INTO events VALUES("54","0","06-10 PIC MR LU JIADONG","Maasai mara gamedrives, lunch Keekorok, FB Keekorok Lodge.","6","-","1","Francis Matano","0","","2013-06-14","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","184","");
INSERT INTO events VALUES("55","0","06-10 PIC MR LU JIADONG","Maasai mara gamedrives, FB Keekorok Lodge","6","-","1","Francis Matano","0","","2013-06-15","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","185","");
INSERT INTO events VALUES("56","0","06-10 PIC MR LU JIADONG","Morning drive to Amboseli, hot lunch Silversprings Hotel, HB Kibo Safari Camp","6","-","1","Francis Matano","0","","2013-06-16","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","186","");
INSERT INTO events VALUES("57","0","06-10 PIC MR LU JIADONG","Amboseli gamedrives, Check out &amp; transfer to Oltukai Lodge for lunch","6","-","1","Francis Matano","0","","2013-06-17","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","187","");
INSERT INTO events VALUES("58","0","06-10 PIC MR LU JIADONG","Drive to Arusha to catch flight at 1500h (lunch and dinner own arrangements)","6","-","1","Francis Matano","0","","2013-06-18","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-05-24","0","188","");
INSERT INTO events VALUES("59","0","07-22 KILI BEACH 306","Flight","3","-","1","","0","","2013-07-22","2013-07-22","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","189","");
INSERT INTO events VALUES("60","0","07-22 KILI BEACH 306","Arrival morning  ET 12.00h, and transfer with snacks to Loitokitok, lunch on the way, HB Cottages","54","-","1","Francis Matano","0","","2013-07-23","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-07-22","0","190","");
INSERT INTO events VALUES("61","0","07-22 KILI BEACH 306","Transfer to Start and hike to 1st Cave , O/N tents (F/B)","54","-","1","jackson","0","","2013-07-24","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-22","0","191","Can Minibus from TZ do transfer? chembera");
INSERT INTO events VALUES("62","0","07-22 KILI BEACH 306","Hike to Kikelewa Cave , O/N tents, (F/B)","22","-","1","eric atinga","0","","2013-07-25","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-06-26","0","192","");
INSERT INTO events VALUES("63","0","07-22 KILI BEACH 306","Hike to Mawenzi Tarnhut, O/N tents ( FB)","63","-","1","jackson","0","","2013-07-26","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-26","0","193","");
INSERT INTO events VALUES("64","0","07-22 KILI BEACH 306","Cross saddle to School Hut , O/N hut,  (F/B)","22","-","1","eric atinga","0","","2013-07-27","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-06-26","0","194","");
INSERT INTO events VALUES("65","0","07-22 KILI BEACH 306","Ascend Summit and descend to Horombo, O/N tents,   (F/B)","22","-","1","eric atinga","0","","2013-07-28","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-06-26","0","195","");
INSERT INTO events VALUES("66","0","07-22 KILI BEACH 306","Descend Marangu Gate and  transfer to Loitokitok, HB Cottages","3","-","1","","0","","2013-07-29","2013-07-29","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","197","");
INSERT INTO events VALUES("67","0","07-22 KILI BEACH 306","Drive to Tsavo West, game drives, Overnight Severin Safari Camp.","3","-","1","","0","","2013-07-29","2013-07-29","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-01-28","0","197","");
INSERT INTO events VALUES("68","0","07-22 KILI BEACH 306","Tsavo West game drives, sundowner, FB Severin Safari Camp","7","-","1","jackson","0","","2013-07-31","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","198","");
INSERT INTO events VALUES("69","0","07-22 KILI BEACH 306","Drive to Mombasa, HB Severin Sea Lodge","7","-","1","jackson","0","","2013-08-01","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-31","0","199","");
INSERT INTO events VALUES("70","0","07-22 KILI BEACH 306","HB Severin Sea Lodge","7","-","1","jackson","0","","2013-08-02","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","200","");
INSERT INTO events VALUES("71","0","07-22 KILI BEACH 306","HB Severin Sea Lodge","46","-","1","Francis Matano","0","","2013-08-03","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-08-02","0","201","");
INSERT INTO events VALUES("72","0","07-22 KILI BEACH 306","HB Severin Sea Lodge","46","-","1","Francis Matano","0","","2013-08-04","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-08-02","0","202","");
INSERT INTO events VALUES("73","0","07-22 KILI BEACH 306","HB Severin Sea Lodge","46","-","1","Toni Tschank","0","","2013-08-05","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","toni@kiboslopessafaris.com","9999-00-00","2013-08-05","0","203","");
INSERT INTO events VALUES("74","0","07-22 KILI BEACH 306","Transfer to airport for 17.20h flight ET","90","SEVERIN SEA LODGE","1","Toni Tschank","0","","2013-08-06","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","francis@kiboslopessafaris.com","9999-00-00","2013-08-06","0","204","");
INSERT INTO events VALUES("75","0","07-08 RAIFFE DORIS WANDL","Arrival Zanzibar, KQ, 20.20H and transfer to Gemma Del Est, HB","10","-","1","jackson","0","","2013-07-08","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-06","-1","205","");
INSERT INTO events VALUES("76","0","07-08 RAIFFE DORIS WANDL","Gemma Del Est,HB","46","-","1","eric atinga","0","","2013-07-09","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-09","0","206","");
INSERT INTO events VALUES("77","0","07-08 RAIFFE DORIS WANDL","Gemma Del Est,HB","46","-","1","eric atinga","0","","2013-07-10","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-09","0","207","");
INSERT INTO events VALUES("78","0","07-08 RAIFFE DORIS WANDL","Gemma Del Est,HB","46","-","1","eric atinga","0","","2013-07-11","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-09","0","208","");
INSERT INTO events VALUES("79","0","07-08 RAIFFE DORIS WANDL","Gemma Del Est,HB","46","-","1","eric atinga","0","","2013-07-12","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-10","0","209","");
INSERT INTO events VALUES("80","0","07-08 RAIFFE DORIS WANDL","Transfer to the airport for 18.50h , PW 715, flight to NRB","33","-","1","eric atinga","0","","2013-07-13","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","eatinga@yahoo.com","9999-00-00","2013-07-06","0","210","");
INSERT INTO events VALUES("81","0","07-25 PIC LIANG MINHONG","Pick up from at 06.05, drive to Samburu, hot lunch in Trout Tree, stop at Equotar, afternoon gamedrives in Samburu, FB Samburu Sopa (Breakfast own arrangement)","3","-","1","","0","","2013-07-25","2013-07-25","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","226","");
INSERT INTO events VALUES("82","0","07-25 PIC LIANG MINHONG","Game drives in Samburu, Shaba and Buffalo Springs area, FB Samburu Sopa Lodge","50","-","1","Jackson","0","","2013-07-26","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-01-28","0","212","");
INSERT INTO events VALUES("83","0","07-25 PIC LIANG MINHONG","Morning drive to Sweetwaters, hot lunch in hotel, afternoon game drives, FB Sweetwaters Tented Camp","50","-","1","","0","","2013-07-27","2013-07-27","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","213","");
INSERT INTO events VALUES("84","0","07-25 PIC LIANG MINHONG","Morning gamedrives, then drive to L.Bogoria for hot lunch, afternoon gamedrives in Bogoria, FB Lake Bogoria Spa Resort","3","-","1","","0","","2013-07-28","2013-07-28","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","214","");
INSERT INTO events VALUES("85","0","07-25 PIC LIANG MINHONG","Morning gamedrives in Bogoria, then drive to Nakuru for hot lunch, relax in the afternoon, FB Waterbuck Hotel","3","-","1","","0","","2013-07-29","2013-07-29","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","215","");
INSERT INTO events VALUES("86","0","07-25 PIC LIANG MINHONG","Nakuru gamedrives with lunchbox, FB Waterbuck Hotel.","3","-","1","","0","","2013-07-30","2013-07-30","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","216","");
INSERT INTO events VALUES("87","0","07-25 PIC LIANG MINHONG","Drive to Maasai Mara, hot lunch in the hotel, afternoon game drives, FB Mara Sidai Camp","50","-","1","jackson","0","","2013-07-31","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","217","");
INSERT INTO events VALUES("88","0","07-25 PIC LIANG MINHONG","Maasa Mara gamedrives, FB Mara Sidai Camp","50","-","1","jackson","0","","2013-08-01","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","218","");
INSERT INTO events VALUES("89","0","07-25 PIC LIANG MINHONG","Maasa Mara gamedrives, FB Mara Sidai Camp","50","-","1","jackson","0","","2013-08-02","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","219","");
INSERT INTO events VALUES("90","0","07-25 PIC LIANG MINHONG","Drive to Naivasha, hot lunch in the hotel, (Boat ride and walking safari own arrangement) FB Lake Naivasha  Country Club","50","-","1","jackson","0","","2013-08-03","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","220","");
INSERT INTO events VALUES("91","0","07-25 PIC LIANG MINHONG","Drive to Amboseli with luncbox, relax in the afternoon, FB Kibo Safari Camp","50","-","1","jackson","0","","2013-08-04","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","221","");
INSERT INTO events VALUES("92","0","07-25 PIC LIANG MINHONG","Amboseli game drives, ( Maasai Village own arrangement) FB Kibo Safari Camp","50","-","1","jackson","0","","2013-08-05","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","222","");
INSERT INTO events VALUES("93","0","07-25 PIC LIANG MINHONG","Drive back to Nairobi with lunch box ( Hot lunch optional) city tour, then transfer to the airport to catch flight at 22.15 (dinner own arrangement)","50","-","1","jackson","0","","2013-08-06","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-31","0","223","");
INSERT INTO events VALUES("94","0","07-27 PIC Ms. YU HONG","Pick up NBI Airport at 12.45h and transfer to Gracia Gardens, BB (lunch and dinner own arrangements)","3","-","1","","0","","2013-07-27","2013-07-27","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","224","");
INSERT INTO events VALUES("95","0","07-25 PIC LIANG MINHONG","Pick up from at 06.05, drive to Samburu, lunch Trout Tree, stop at Equator, afternoon game drives in Samburu, FB Samburu Sopa (Breakfast own arrangement)","3","-","1","Jackson","0","","2013-07-25","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","9999-00-00","2013-07-19","-1","226","");
INSERT INTO events VALUES("96","0","07-25 PIC LIANG MINHONG","Pick up from at 06.05, drive to Samburu, lunch Trout Tree, stop at Equator, afternoon game drives in Samburu, FB Samburu Sopa (Breakfast own arrangement)","3","-","1","","0","","2013-07-25","9999-00-00","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","jackson@kiboslopessafaris.com","2013-01-28","2013-01-28","0","226","");
INSERT INTO events VALUES("97","0","07-25 PIC LIANG MINHONG","Pick up from at 06.05, drive to Samburu, hot lunch in Trout Tree, stop at Equotar, afternoon gamedrives in Samburu, FB Samburu Sopa (Breakfast own arrangement)","0","-","1","","0","","2013-07-25","2013-07-25","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","2013-01-28","0","226","X");
INSERT INTO events VALUES("98","0","07-27 PIC Ms. YU HONG","Drive to Samburu with lunchboxes, stop at equator, afternoon gamedrives in Samburu, FB Samburu Game Lodge","3","-","1","","0","","2013-07-28","2013-07-28","","00:00:00","99:00:00","0","0","0","0","9999-00-00","-1","","9999-00-00","9999-00-00","0","227","");
INSERT INTO events VALUES("99","0","07-27 PIC Ms. YU HONG","Full day gamedrives Samburu, Shaba and buffalo Springs, FB Samburu Game Lodge","3","-","1","","0","","2013-07-29","2013-07-29","","