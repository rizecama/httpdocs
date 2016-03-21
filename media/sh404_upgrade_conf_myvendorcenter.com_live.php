<?php
// config.sef.php : configuration file for sh404SEF for Joomla 1.5.x
// 2.4.6.1033
// saved at: 2013-11-26 09:53:30
// by: CAMA (id: 62 )
// domain: http://myvendorcenter.com/live

if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

$version = '2.4.6.1033';
$Enabled = '0';
$replacement = '-';
$pagerep = '-';
$stripthese = ',|~|!|@|%|^|(|)|<|>|:|;|{|}|[|]|&|`|„|‹|’|‘|“|”|•|›|«|´|»|°';
$shReplacements = 'Š|S, Œ|O, Ž|Z, š|s, œ|oe, ž|z, Ÿ|Y, ¥|Y, µ|u, À|A, Á|A, Â|A, Ã|A, Ä|A, Å|A, Æ|A, Ç|C, È|E, É|E, Ê|E, Ë|E, Ì|I, Í|I, Î|I, Ï|I, Ð|D, Ñ|N, Ò|O, Ó|O, Ô|O, Õ|O, Ö|O, Ø|O, Ù|U, Ú|U, Û|U, Ü|U, Ý|Y, ß|s, à|a, á|a, â|a, ã|a, ä|a, å|a, æ|a, ç|c, è|e, é|e, ê|e, ë|e, ì|i, í|i, î|i, ï|i, ð|o, ñ|n, ò|o, ó|o, ô|o, õ|o, ö|o, ø|o, ù|u, ú|u, û|u, ü|u, ý|y, ÿ|y, ß|ss, ă|a, ş|s, ţ|t, ț|t, Ț|T, Ș|S, ș|s, Ş|S';
$suffix = '.html';
$addFile = '';
$friendlytrim = '-|.';
$LowerCase = '0';
$ShowSection = false;
$ShowCat = true;
$UseAlias = true;
$page404 = 0;
$predefined = array();
$skip = array("rsform","camassistant","user");
$nocache = array();
$shDoNotOverrideOwnSef = array();
$shLog404Errors = '1';
$shUseURLCache = '1';
$shMaxURLInCache = '10000';
$shTranslateURL = '1';
$shInsertLanguageCode = '1';
$notTranslateURLList = array("rsform","camassistant","user");
$notInsertIsoCodeList = array("rsform");
$shInsertGlobalItemidIfNone = '0';
$shInsertTitleIfNoItemid = '0';
$shAlwaysInsertMenuTitle = '0';
$shAlwaysInsertItemid = '0';
$shDefaultMenuItemName = '';
$shAppendRemainingGETVars = true;
$shVmInsertShopName = false;
$shInsertProductId = false;
$shVmUseProductSKU = false;
$shVmInsertManufacturerName = false;
$shInsertManufacturerId = false;
$shVMInsertCategories = 1;
$shVmAdditionalText = true;
$shVmInsertFlypage = true;
$shInsertCategoryId = false;
$shInsertNumericalId = '0';
$shInsertNumericalIdCatList = array("1","3","29","28","25","27","30","31","32","34","35","36","37","38","39","40");
$shRedirectNonSefToSef = '1';
$shRedirectJoomlaSefToSef = '0';
$shConfig_live_secure_site = '';
$shActivateIJoomlaMagInContent = true;
$shInsertIJoomlaMagIssueId = false;
$shInsertIJoomlaMagName = false;
$shInsertIJoomlaMagMagazineId = false;
$shInsertIJoomlaMagArticleId = false;
$shInsertCBName = false;
$shCBInsertUserName = false;
$shCBInsertUserId = true;
$shCBUseUserPseudo = true;
$shLMDefaultItemid = 0;
$shInsertFireboardName = false;
$shFbInsertCategoryName = true;
$shFbInsertCategoryId = false;
$shFbInsertMessageSubject = true;
$shFbInsertMessageId = true;
$shInsertMyBlogName = false;
$shMyBlogInsertPostId = true;
$shMyBlogInsertTagId = false;
$shMyBlogInsertBloggerId = true;
$shInsertDocmanName = false;
$shDocmanInsertDocId = true;
$shDocmanInsertDocName = true;
$shDMInsertCategories = 1;
$shDMInsertCategoryId = false;
$shEncodeUrl = '0';
$guessItemidOnHomepage = '1';
$shForceNonSefIfHttps = '0';
$shRewriteMode = '0';
$shRewriteStrings = array("/","/index.php/","/index.php?/");
$shRecordDuplicates = true;
$shRemoveGeneratorTag = true;
$shPutH1Tags = false;
$shMetaManagementActivated = true;
$shInsertContentTableName = true;
$shContentTableName = 'Table';
$shAutoRedirectWww = '1';
$shVmInsertProductName = true;
$shForcedHomePage = '';
$shInsertContentBlogName = false;
$shContentBlogName = '';
$shInsertMTreeName = false;
$shMTreeInsertListingName = true;
$shMTreeInsertListingId = true;
$shMTreePrependListingId = true;
$shMTreeInsertCategories = 1;
$shMTreeInsertCategoryId = false;
$shMTreeInsertUserName = true;
$shMTreeInsertUserId = true;
$shInsertNewsPName = false;
$shNewsPInsertCatId = false;
$shNewsPInsertSecId = false;
$shInsertRemoName = false;
$shRemoInsertDocId = true;
$shRemoInsertDocName = true;
$shRemoInsertCategories = 1;
$shRemoInsertCategoryId = false;
$shCBShortUserURL = false;
$shKeepStandardURLOnUpgrade = '1';
$shKeepCustomURLOnUpgrade = '1';
$shKeepMetaDataOnUpgrade = '1';
$shKeepModulesSettingsOnUpgrade = true;
$shMultipagesTitle = true;
$encode_page_suffix = '';
$encode_space_char = '-';
$encode_lowercase = '0';
$encode_strip_chars = ',|~|!|@|%|^|(|)|<|>|:|;|{|}|[|]|&|`|„|‹|’|‘|“|”|•|›|«|´|»|°';
$spec_chars_d = 'Š,Œ,Ž,š,œ,ž,Ÿ,¥,µ,À,Á,Â,Ã,Ä,Å,Æ,Ç,È,É,Ê,Ë,Ì,Í,Î,Ï,Ð,Ñ,Ò,Ó,Ô,Õ,Ö,Ø,Ù,Ú,Û,Ü,Ý,ß,à,á,â,ã,ä,å,æ,ç,è,é,ê,ë,ì,í,î,ï,ð,ñ,ò,ó,ô,õ,ö,ø,ù,ú,û,ü,ý,ÿ,ă,ş,ţ,ț,Ț,Ș,ș,Ş,';
$spec_chars = 'S,O,Z,s,oe,z,Y,Y,u,A,A,A,A,A,A,A,C,E,E,E,E,I,I,I,I,D,N,O,O,O,O,O,O,U,U,U,U,Y,ss,a,a,a,a,a,a,a,c,e,e,e,e,i,i,i,i,o,n,o,o,o,o,o,o,u,u,u,u,y,y,a,s,t,t,T,S,s,S,';
$content_page_format = '%s-%d';
$content_page_name = 'Page-';
$shKeepConfigOnUpgrade = '1';
$shSecEnableSecurity = '0';
$shSecLogAttacks = '1';
$shSecOnlyNumVars = array("itemid","limit","limitstart");
$shSecAlphaNumVars = array();
$shSecNoProtocolVars = array("task","option","no_html","mosmsg","lang");
$shSecCheckHoneyPot = '0';
$shSecHoneyPotKey = '';
$shSecEntranceText = '<p>Sorry. You are visiting this site from a suspicious IP address, which triggered our protection system.</p>
    <p>If you <strong>ARE NOT</strong> a malware robot of any kind, please accept our apologies for the inconvenience. You can access the page by clicking here : ';
$shSecSmellyPotText = 'The following link is here to further trap malicious internet robots, so please don\'t click on it : ';
$monthsToKeepLogs = '1';
$shSecActivateAntiFlood = '1';
$shSecAntiFloodOnlyOnPOST = '0';
$shSecAntiFloodPeriod = '10';
$shSecAntiFloodCount = '10';
$shLangTranslateList = array("en-GB"=>"0");
$shLangInsertCodeList = array("en-GB"=>"0");
$defaultComponentStringList = array("content"=>"","banners"=>"","rsform"=>"","camassistant"=>"","kunena"=>"","contact"=>"","contentsubmit"=>"","eventlist"=>"","feedback"=>"","jcalpro"=>"","jce"=>"","jefaqpro"=>"","jquarks4s"=>"","mailto"=>"","newsfeeds"=>"","phocapdf"=>"","poll"=>"","rsfirewall"=>"","rsmonials"=>"","search"=>"","user"=>"","weblinks"=>"","wrapper"=>"");
$pageTexts = array("en-GB"=>"Page-%s");
$shAdminInterfaceType = 1;
$shInsertNoFollowPDFPrint = true;
$shInsertReadMorePageTitle = true;
$shMultipleH1ToH2 = false;
$shVmUsingItemsPerPage = true;
$shSecCheckPOSTData = '1';
$shSecCurMonth = 0;
$shSecLastUpdated = 0;
$shSecTotalAttacks = 0;
$shSecTotalConfigVars = 0;
$shSecTotalBase64 = 0;
$shSecTotalScripts = 0;
$shSecTotalStandardVars = 0;
$shSecTotalImgTxtCmd = 0;
$shSecTotalIPDenied = 0;
$shSecTotalUserAgentDenied = 0;
$shSecTotalFlooding = 0;
$shSecTotalPHP = 0;
$shSecTotalPHPUserClicked = 0;
$shInsertSMFName = true;
$shSMFItemsPerPage = 20;
$shInsertSMFBoardId = true;
$shInsertSMFTopicId = true;
$shinsertSMFUserName = false;
$shInsertSMFUserId = true;
$appendToPageTitle = '';
$prependToPageTitle = '';
$debugToLogFile = '0';
$debugStartedAt = 0;
$debugDuration = 3600;
$shInsertOutboundLinksImage = false;
$shImageForOutboundLinks = 'external-black.png';
$useCatAlias = false;
$useSecAlias = false;
$useMenuAlias = false;
$shEnableTableLessOutput = false;
$alwaysAppendItemsPerPage = '0';
$redirectToCorrectCaseUrl = '1';
$jclInsertEventId = false;
$jclInsertCategoryId = false;
$jclInsertCalendarId = false;
$jclInsertCalendarName = false;
$jclInsertDate = false;
$jclInsertDateInEventView = true;
$ContentTitleShowSection = false;
$ContentTitleShowCat = true;
$ContentTitleUseAlias = false;
$ContentTitleUseCatAlias = false;
$ContentTitleUseSecAlias = false;
$pageTitleSeparator = ' | ';
$ContentTitleInsertArticleId = false;
$shInsertContentArticleIdCatList = '';
$shJSInsertJSName = true;
$shJSShortURLToUserProfile = true;
$shJSInsertUsername = true;
$shJSInsertUserFullName = false;
$shJSInsertUserId = false;
$shJSInsertGroupCategory = true;
$shJSInsertGroupCategoryId = false;
$shJSInsertGroupId = false;
$shJSInsertGroupBulletinId = false;
$shJSInsertDiscussionId = true;
$shJSInsertMessageId = true;
$shJSInsertPhotoAlbum = true;
$shJSInsertPhotoAlbumId = false;
$shJSInsertPhotoId = true;
$shJSInsertVideoCat = true;
$shJSInsertVideoCatId = false;
$shJSInsertVideoId = true;
$shFbInsertUserName = true;
$shFbInsertUserId = true;
$shFbShortUrlToProfile = true;
$shPageNotFoundItemid = 0;
$autoCheckNewVersion = '1';
$error404SubTemplate = 'index';
$enablePageId = '0';
$compEnablePageId = array();
$analyticsEnabled = '1';
$analyticsReportsEnabled = '1';
$analyticsType = 'ga';
$analyticsId = 'UA-44486501-1';
$analyticsExcludeIP = array();
$analyticsMaxUserLevel = 'Public Frontend';
$analyticsUser = 'myswerveon@gmail.com';
$analyticsPassword = 'cam123cam123';
$analyticsAccount = '';
$analyticsProfile = '';
$autoCheckNewAnalytics = '1';
$analyticsDashboardDateRange = 'week';
$analyticsEnableTimeCollection = '1';
$analyticsEnableUserCollection = '1';
$analyticsDashboardDataType = 'ga:pageviews';
$slowServer = '0';
$insertContactCat = false;
$useJoomsefRouter = array();
$useAcesefRouter = array();
$insertShortlinkTag = '1';
$insertRevCanTag = '0';
$insertAltShorterTag = '0';
$canReadRemoteConfig = '0';
$stopCreatingShurls = '0';
$shurlBlackList = '';
$shurlNonSefBlackList = '';
$enableOpenGraphData = false;
$ogEnableDescription = true;
$ogType = 'article';
$ogImage = '';
$ogEnableSiteName = true;
$ogSiteName = '';
$ogEnableLocation = false;
$ogLatitude = '';
$ogLongitude = '';
$ogStreetAddress = '';
$ogLocality = '';
$ogPostalCode = '';
$ogRegion = '';
$ogCountryName = '';
$ogEnableContact = false;
$ogEmail = '';
$ogPhoneNumber = '';
$ogFaxNumber = '';
$fbAdminIds = '';
$socialButtonType = 'facebook';
$fileAccessStatus = array(" <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>"," <b><font color=\"green\">Writeable</font></b>");
?>