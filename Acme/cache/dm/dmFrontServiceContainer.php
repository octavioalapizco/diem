<?php

class dmFrontServiceContainer extends dmFrontBaseServiceContainer
{
  protected $shared = array();

  public function __construct()
  {
    parent::__construct($this->getDefaultParameters());
  }

  protected function getTextDiffService()
  {
    if (isset($this->shared['text_diff'])) return $this->shared['text_diff'];

    $class = $this->getParameter('text_diff.class');
    $instance = new $class();

    return $this->shared['text_diff'] = $instance;
  }

  protected function getRecordTextDiffService()
  {
    if (isset($this->shared['record_text_diff'])) return $this->shared['record_text_diff'];

    $class = $this->getParameter('record_text_diff.class');
    $instance = new $class($this->getService('text_diff'), $this->getService('i18n'), $this->getService('helper'), $this->getParameter('record_text_diff.options'));

    return $this->shared['record_text_diff'] = $instance;
  }

  protected function getMailService()
  {
    $class = $this->getParameter('mail.class');
    $instance = new $class($this->getService('context'), $this->getService('dispatcher'));

    return $instance;
  }

  protected function getThreadLauncherService()
  {
    $class = $this->getParameter('thread_launcher.class');
    $instance = new $class($this->getService('filesystem'), $this->getParameter('thread_launcher.options'));

    return $instance;
  }

  protected function getPageSynchronizerService()
  {
    if (isset($this->shared['page_synchronizer'])) return $this->shared['page_synchronizer'];

    $class = $this->getParameter('page_synchronizer.class');
    $instance = new $class($this->getService('module_manager'));

    return $this->shared['page_synchronizer'] = $instance;
  }

  protected function getSeoSynchronizerService()
  {
    if (isset($this->shared['seo_synchronizer'])) return $this->shared['seo_synchronizer'];

    $class = $this->getParameter('seo_synchronizer.class');
    $instance = new $class($this->getService('module_manager'));

    return $this->shared['seo_synchronizer'] = $instance;
  }

  protected function getCacheCleanerService()
  {
    if (isset($this->shared['cache_cleaner'])) return $this->shared['cache_cleaner'];

    $class = $this->getParameter('cache_cleaner.class');
    $instance = new $class($this->getService('cache_manager'), $this->getService('dispatcher'), $this->getParameter('cache_cleaner.options'));

    return $this->shared['cache_cleaner'] = $instance;
  }

  protected function getMarkdownService()
  {
    if (isset($this->shared['markdown'])) return $this->shared['markdown'];

    $class = $this->getParameter('markdown.class');
    $instance = new $class($this->getService('helper'), $this->getParameter('markdown.options'));

    return $this->shared['markdown'] = $instance;
  }

  protected function getScriptNameResolverService()
  {
    if (isset($this->shared['script_name_resolver'])) return $this->shared['script_name_resolver'];

    $class = $this->getParameter('script_name_resolver.class');
    $instance = new $class($this->getParameter('request.context'), $this->getParameter('user.culture'));

    return $this->shared['script_name_resolver'] = $instance;
  }

  protected function getErrorWatcherService()
  {
    if (isset($this->shared['error_watcher'])) return $this->shared['error_watcher'];

    $class = $this->getParameter('error_watcher.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('context'), $this->getParameter('error_watcher.options'));

    return $this->shared['error_watcher'] = $instance;
  }

  protected function getMediaTagImageService()
  {
    $class = $this->getParameter('media_tag_image.class');
    $instance = new $class($this->getParameter('media_tag.source'), $this->getService('context'), $this->getParameter('media_tag_image.options'));

    return $instance;
  }

  protected function getMediaTagApplicationService()
  {
    $class = $this->getParameter('media_tag_application.class');
    $instance = new $class($this->getParameter('media_tag.source'), $this->getService('context'), $this->getParameter('media_tag_application.options'));

    return $instance;
  }

  protected function getMediaTagVideoService()
  {
    $class = $this->getParameter('media_tag_video.class');
    $instance = new $class($this->getParameter('media_tag.source'), $this->getService('context'), $this->getParameter('media_tag_video.options'));

    return $instance;
  }

  protected function getMediaTagAudioService()
  {
    $class = $this->getParameter('media_tag_audio.class');
    $instance = new $class($this->getParameter('media_tag.source'), $this->getService('context'), $this->getParameter('media_tag_audio.options'));

    return $instance;
  }

  protected function getMediaResourceService()
  {
    $class = $this->getParameter('media_resource.class');
    $instance = new $class($this->getService('mime_type_resolver'), $this->getParameter('user.theme'), $this->getParameter('user.culture'), $this->getParameter('request.context'));

    return $instance;
  }

  protected function getTableTagService()
  {
    $class = $this->getParameter('table_tag.class');
    $instance = new $class($this->getService('helper'));

    return $instance;
  }

  protected function getSearchEngineService()
  {
    if (isset($this->shared['search_engine'])) return $this->shared['search_engine'];

    $class = $this->getParameter('search_engine.class');
    $instance = new $class($this, $this->getParameter('search_engine.options'));

    return $this->shared['search_engine'] = $instance;
  }

  protected function getSearchIndexService()
  {
    $class = $this->getParameter('search_index.class');
    $instance = new $class($this, $this->getParameter('search_index.options'));

    return $instance;
  }

  protected function getSearchDocumentService()
  {
    $class = $this->getParameter('search_document.class');
    $instance = new $class($this->getService('context'), $this->getParameter('search_document.source'), $this->getParameter('search_document.options'));

    return $instance;
  }

  protected function getSearchHitService()
  {
    $class = $this->getParameter('search_hit.class');
    $instance = new $class($this->getParameter('search_hit.score'), $this->getParameter('search_hit.page_id'), $this->getParameter('search_hit.page_content'));

    return $instance;
  }

  protected function getAssetConfigService()
  {
    if (isset($this->shared['asset_config'])) return $this->shared['asset_config'];

    $class = $this->getParameter('asset_config.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('user'));

    return $this->shared['asset_config'] = $instance;
  }

  protected function getThemeService()
  {
    $class = $this->getParameter('theme.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this->getParameter('request.context'), $this->getParameter('theme.options'));

    return $instance;
  }

  protected function getStylesheetCompressorService()
  {
    if (isset($this->shared['stylesheet_compressor'])) return $this->shared['stylesheet_compressor'];

    $class = $this->getParameter('stylesheet_compressor.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this->getParameter('request.context'), $this->getParameter('stylesheet_compressor.options'));

    return $this->shared['stylesheet_compressor'] = $instance;
  }

  protected function getJavascriptCompressorService()
  {
    if (isset($this->shared['javascript_compressor'])) return $this->shared['javascript_compressor'];

    $class = $this->getParameter('javascript_compressor.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this->getParameter('request.context'), $this->getParameter('javascript_compressor.options'));

    return $this->shared['javascript_compressor'] = $instance;
  }

  protected function getLayoutHelperService()
  {
    $class = $this->getParameter('layout_helper.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getParameter('layout_helper.options'));

    return $instance;
  }

  protected function getFilesystemService()
  {
    if (isset($this->shared['filesystem'])) return $this->shared['filesystem'];

    $class = $this->getParameter('filesystem.class');
    $instance = new $class($this->getService('dispatcher'));

    return $this->shared['filesystem'] = $instance;
  }

  protected function getMimeTypeResolverService()
  {
    if (isset($this->shared['mime_type_resolver'])) return $this->shared['mime_type_resolver'];

    $class = $this->getParameter('mime_type_resolver.class');
    $instance = new $class($this->getService('cache_manager'));

    return $this->shared['mime_type_resolver'] = $instance;
  }

  protected function getEventLogService()
  {
    if (isset($this->shared['event_log'])) return $this->shared['event_log'];

    $class = $this->getParameter('event_log.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this, $this->getParameter('event_log.options'));

    return $this->shared['event_log'] = $instance;
  }

  protected function getEventLogEntryService()
  {
    $class = $this->getParameter('event_log_entry.class');
    $instance = new $class($this);

    return $instance;
  }

  protected function getRequestLogService()
  {
    if (isset($this->shared['request_log'])) return $this->shared['request_log'];

    $class = $this->getParameter('request_log.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this, $this->getParameter('request_log.options'));

    return $this->shared['request_log'] = $instance;
  }

  protected function getRequestLogEntryService()
  {
    $class = $this->getParameter('request_log_entry.class');
    $instance = new $class($this);

    return $instance;
  }

  protected function getBrowserService()
  {
    $class = $this->getParameter('browser.class');
    $instance = new $class($this->getParameter('browser.user_agent_string'), $this->getService('user_agent_parser'));
    $instance->setEventDispatcher($this->getService('dispatcher'));

    return $instance;
  }

  protected function getUserAgentParserService()
  {
    if (isset($this->shared['user_agent_parser'])) return $this->shared['user_agent_parser'];

    $class = $this->getParameter('user_agent_parser.class');
    $instance = new $class();

    return $this->shared['user_agent_parser'] = $instance;
  }

  protected function getPageTreeWatcherService()
  {
    if (isset($this->shared['page_tree_watcher'])) return $this->shared['page_tree_watcher'];

    $class = $this->getParameter('page_tree_watcher.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getParameter('page_tree_watcher.options'));

    return $this->shared['page_tree_watcher'] = $instance;
  }

  protected function getFileBackupService()
  {
    if (isset($this->shared['file_backup'])) return $this->shared['file_backup'];

    $class = $this->getParameter('file_backup.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('filesystem'), $this->getParameter('file_backup.options'));

    return $this->shared['file_backup'] = $instance;
  }

  protected function getHelperService()
  {
    if (isset($this->shared['helper'])) return $this->shared['helper'];

    $class = $this->getParameter('helper.class');
    $instance = new $class($this->getService('context'), $this->getParameter('helper.options'));

    return $this->shared['helper'] = $instance;
  }

  protected function getLinkTagFactoryService()
  {
    if (isset($this->shared['link_tag_factory'])) return $this->shared['link_tag_factory'];

    $class = $this->getParameter('link_tag_factory.class');
    $instance = new $class($this);

    return $this->shared['link_tag_factory'] = $instance;
  }

  protected function getCacheManagerService()
  {
    if (isset($this->shared['cache_manager'])) return $this->shared['cache_manager'];

    $class = $this->getParameter('cache_manager.class');
    $instance = new $class($this->getService('dispatcher'), $this->getParameter('cache_manager.options'));

    return $this->shared['cache_manager'] = $instance;
  }

  protected function getWidgetTypeManagerService()
  {
    if (isset($this->shared['widget_type_manager'])) return $this->shared['widget_type_manager'];

    $class = $this->getParameter('widget_type_manager.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getParameter('widget_type_manager.options'));

    return $this->shared['widget_type_manager'] = $instance;
  }

  protected function getPageI18nBuilderService()
  {
    if (isset($this->shared['page_i18n_builder'])) return $this->shared['page_i18n_builder'];

    $class = $this->getParameter('page_i18n_builder.class');
    $instance = new $class($this->getService('dispatcher'), $this->getParameter('page_i18n_builder.options'));

    return $this->shared['page_i18n_builder'] = $instance;
  }

  protected function getProjectLoremizerService()
  {
    $class = $this->getParameter('project_loremizer.class');
    $instance = new $class($this->getService('module_manager'), $this, $this->getParameter('project_loremizer.options'));

    return $instance;
  }

  protected function getTableLoremizerService()
  {
    $class = $this->getParameter('table_loremizer.class');
    $instance = new $class($this, $this->getParameter('table_loremizer.options'));

    return $instance;
  }

  protected function getRecordLoremizerService()
  {
    $class = $this->getParameter('record_loremizer.class');
    $instance = new $class($this->getParameter('record_loremizer.options'));

    return $instance;
  }

  protected function getTestFunctionalService()
  {
    $class = $this->getParameter('test_functional.class');
    $instance = new $class($this->getService('sf_browser'));

    return $instance;
  }

  protected function getSfBrowserService()
  {
    $class = $this->getParameter('sf_browser.class');
    $instance = new $class();

    return $instance;
  }

  protected function getDoctrinePagerService()
  {
    $class = $this->getParameter('doctrine_pager.class');
    $instance = new $class($this->getParameter('doctrine_pager.model'));

    return $instance;
  }

  protected function getWebBrowserService()
  {
    if (isset($this->shared['web_browser'])) return $this->shared['web_browser'];

    $class = $this->getParameter('web_browser.class');
    $instance = new $class($this->getParameter('web_browser.options'));

    return $this->shared['web_browser'] = $instance;
  }

  protected function getMenuService()
  {
    $class = $this->getParameter('menu.class');
    $instance = new $class($this, $this->getParameter('menu.options'));

    return $instance;
  }

  protected function getMediaSynchronizerService()
  {
    if (isset($this->shared['media_synchronizer'])) return $this->shared['media_synchronizer'];

    $class = $this->getParameter('media_synchronizer.class');
    $instance = new $class($this->getService('filesystem'));

    return $this->shared['media_synchronizer'] = $instance;
  }

  protected function getPageTreeViewService()
  {
    $class = $this->getParameter('page_tree_view.class');
    $instance = new $class($this->getService('helper'), $this->getParameter('user.culture'), $this->getParameter('page_tree_view.options'));

    return $instance;
  }

  protected function getDownloadService()
  {
    $class = $this->getParameter('download.class');
    $instance = new $class($this->getService('response'), $this->getService('mime_type_resolver'), $this->getParameter('download.options'));

    return $instance;
  }

  protected function getDataLoadService()
  {
    $class = $this->getParameter('data_load.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('i18n'));

    return $instance;
  }

  protected function getMarkdownTranslatorService()
  {
    $class = $this->getParameter('markdown_translator.class');
    $instance = new $class($this->getService('i18n'), $this->getParameter('markdown_translator.options'));

    return $instance;
  }

  protected function getToolBarViewService()
  {
    $class = $this->getParameter('tool_bar_view.class');
    $instance = new $class($this->getService('dispatcher'), $this->getService('user'), $this->getService('helper'), $this->getService('i18n'), $this);

    return $instance;
  }

  protected function getBrowserCheckService()
  {
    $class = $this->getParameter('browser_check.class');
    $instance = new $class($this->getService('user'));

    return $instance;
  }

  protected function getPageRoutingService()
  {
    if (isset($this->shared['page_routing'])) return $this->shared['page_routing'];

    $class = $this->getParameter('page_routing.class');
    $instance = new $class($this, $this->getParameter('page_routing.options'));

    return $this->shared['page_routing'] = $instance;
  }

  protected function getHtmlSitemapService()
  {
    if (isset($this->shared['html_sitemap'])) return $this->shared['html_sitemap'];

    $class = $this->getParameter('html_sitemap.class');
    $instance = new $class($this->getService('helper'), $this->getParameter('user.culture'));

    return $this->shared['html_sitemap'] = $instance;
  }

  protected function getPageNotFoundHandlerService()
  {
    $class = $this->getParameter('page_not_found_handler.class');
    $instance = new $class($this, $this->getService('dispatcher'));

    return $instance;
  }

  protected function getFormManagerService()
  {
    if (isset($this->shared['form_manager'])) return $this->shared['form_manager'];

    $class = $this->getParameter('form_manager.class');
    $instance = new $class($this, $this->getService('dispatcher'));

    return $this->shared['form_manager'] = $instance;
  }

  protected function getLinkTagRecordService()
  {
    $class = $this->getParameter('link_tag_record.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getParameter('request.context'), $this->getParameter('context.page'), $this->getService('user'), $this->getParameter('link_tag_record.options'));

    return $instance;
  }

  protected function getLinkTagPageService()
  {
    $class = $this->getParameter('link_tag_page.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getParameter('request.context'), $this->getParameter('context.page'), $this->getService('user'), $this->getParameter('link_tag_page.options'));

    return $instance;
  }

  protected function getLinkTagMediaService()
  {
    $class = $this->getParameter('link_tag_media.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getParameter('request.context'), $this->getParameter('link_tag_media.options'));

    return $instance;
  }

  protected function getLinkTagActionService()
  {
    $class = $this->getParameter('link_tag_action.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getService('controller'), $this->getParameter('request.context'), $this->getParameter('link_tag_action.options'));

    return $instance;
  }

  protected function getLinkTagUriService()
  {
    $class = $this->getParameter('link_tag_uri.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getService('controller'), $this->getParameter('request.context'), $this->getParameter('link_tag_uri.options'));

    return $instance;
  }

  protected function getLinkTagRouteService()
  {
    $class = $this->getParameter('link_tag_route.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getService('controller'), $this->getService('routing'), $this->getParameter('request.context'), $this->getParameter('link_tag_uri.options'));

    return $instance;
  }

  protected function getLinkTagErrorService()
  {
    $class = $this->getParameter('link_tag_error.class');
    $instance = new $class($this->getParameter('link_tag.resource'), $this->getParameter('request.context'), $this->getParameter('link_tag_error.options'));

    return $instance;
  }

  protected function getLinkResourceService()
  {
    $class = $this->getParameter('link_resource.class');
    $instance = new $class();

    return $instance;
  }

  protected function getThemeManagerService()
  {
    if (isset($this->shared['theme_manager'])) return $this->shared['theme_manager'];

    $class = $this->getParameter('theme_manager.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getParameter('theme_manager.options'));

    return $this->shared['theme_manager'] = $instance;
  }

  protected function getWidgetViewService()
  {
    $class = $this->getParameter('widget_view.class');
    $instance = new $class($this->getService('context'), $this->getParameter('widget_view.type'), $this->getParameter('widget_view.data'));

    return $instance;
  }

  protected function getPageHelperService()
  {
    if (isset($this->shared['page_helper'])) return $this->shared['page_helper'];

    $class = $this->getParameter('page_helper.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getService('helper'), $this->getParameter('page_helper.options'));

    return $this->shared['page_helper'] = $instance;
  }

  protected function getWidgetRendererService()
  {
    $class = $this->getParameter('widget_renderer.class');
    $instance = new $class($this->getService('dispatcher'), $this, $this->getParameter('widget_renderer.widget'));

    return $instance;
  }

  protected function getZoneFormService()
  {
    $class = $this->getParameter('zone_form.class');
    $instance = new $class($this->getParameter('zone_form.object'));

    return $instance;
  }

  protected function getFrontAddMenuService()
  {
    if (isset($this->shared['front_add_menu'])) return $this->shared['front_add_menu'];

    $class = $this->getParameter('front_add_menu.class');
    $instance = new $class($this, $this->getParameter('menu.options'));

    return $this->shared['front_add_menu'] = $instance;
  }

  protected function getFrontCodeEditorFileMenuService()
  {
    if (isset($this->shared['front_code_editor_file_menu'])) return $this->shared['front_code_editor_file_menu'];

    $class = $this->getParameter('front_code_editor_file_menu.class');
    $instance = new $class($this, $this->getParameter('menu.options'));

    return $this->shared['front_code_editor_file_menu'] = $instance;
  }

  protected function getFrontClipboardService()
  {
    if (isset($this->shared['front_clipboard'])) return $this->shared['front_clipboard'];

    $class = $this->getParameter('front_clipboard.class');
    $instance = new $class($this->getService('user'));

    return $this->shared['front_clipboard'] = $instance;
  }

  protected function getFrontPagerViewService()
  {
    $class = $this->getParameter('front_pager_view.class');
    $instance = new $class($this->getService('context'), $this->getParameter('front_pager_view.options'));

    return $instance;
  }

  protected function getSitemapMenuService()
  {
    $class = $this->getParameter('sitemap_menu.class');
    $instance = new $class($this, $this->getParameter('menu.options'));

    return $instance;
  }

  protected function getHelperExtensionService()
  {
    if (isset($this->shared['helper_extension'])) return $this->shared['helper_extension'];

    $class = $this->getParameter('helper_extension.class');
    $instance = new $class($this->getService('dispatcher'), $this);

    return $this->shared['helper_extension'] = $instance;
  }

  protected function getDefaultParameters()
  {
    return array (
  'text_diff.class' => 'dmTextDiff',
  'record_text_diff.class' => 'dmRecordTextDiff',
  'record_text_diff.options' => 
  array (
    'media_width' => 150,
    'media_height' => 100,
  ),
  'mail.class' => 'dmMail',
  'thread_launcher.class' => 'dmThreadLauncher',
  'thread_launcher.options' => 
  array (
    'cli_file' => 'cache/dm/cli.php',
  ),
  'page_synchronizer.class' => 'dmPageSynchronizer',
  'seo_synchronizer.class' => 'dmSeoSynchronizer',
  'media_synchronizer.class' => 'dmMediaSynchronizer',
  'cache_cleaner.class' => 'dmCacheCleaner',
  'cache_cleaner.options' => 
  array (
    'applications' => 
    array (
      0 => 'admin',
      1 => 'front',
    ),
    'environments' => 
    array (
      0 => 'prod',
      1 => 'dev',
    ),
    'safe_models' => 
    array (
      0 => 'DmSentMail',
      1 => 'DmError',
      2 => 'DmRedirect',
      3 => 'DmUser',
      4 => 'DmPermission',
      5 => 'DmGroup',
      6 => 'DmGroupPermission',
      7 => 'DmUserPermission',
      8 => 'DmUserGroup',
      9 => 'DmRememberKey',
      10 => 'DmMailTemplate',
    ),
  ),
  'form_field.class' => 'dmFormField',
  'markdown.class' => 'dmMarkdown',
  'markdown.options' => 
  array (
    'auto_header_id' => true,
  ),
  'script_name_resolver.class' => 'dmScriptNameResolver',
  'error_watcher.class' => 'dmErrorWatcher',
  'error_watcher.options' => 
  array (
    'error_description_class' => 'dmErrorDescription',
    'mail_superadmin' => false,
    'store_in_db' => true,
  ),
  'media_tag_image.class' => 'dmMediaTagImage',
  'media_tag_image.options' => 
  array (
    'resize_method' => 'center',
    'resize_quality' => '95',
  ),
  'media_tag_application.class' => 'dmMediaTagApplication',
  'media_tag_application.options' => 
  array (
  ),
  'media_tag_video.class' => 'dmMediaTagVideo',
  'media_tag_video.options' => 
  array (
  ),
  'media_tag_audio.class' => 'dmMediaTagAudio',
  'media_tag_audio.options' => 
  array (
  ),
  'media_resource.class' => 'dmMediaResource',
  'table_tag.class' => 'dmTableTag',
  'search_engine.class' => 'dmSearchEngine',
  'search_engine.options' => 
  array (
    'dir' => 'data/dm/index',
  ),
  'search_index.class' => 'dmSearchIndex',
  'search_index.options' => 
  array (
    'culture' => NULL,
    'name' => NULL,
  ),
  'search_document.class' => 'dmSearchPageDocument',
  'search_document.source' => NULL,
  'search_document.options' => 
  array (
    'culture' => NULL,
  ),
  'search_hit.class' => 'dmSearchPageHit',
  'search_hit.score' => NULL,
  'search_hit.page_id' => NULL,
  'search_hit.page_content' => NULL,
  'theme.class' => 'dmTheme',
  'stylesheet_compressor.class' => 'dmStylesheetCompressor',
  'stylesheet_compressor.options' => 
  array (
    'minify' => true,
    'gz_compression' => false,
  ),
  'javascript_compressor.class' => 'dmJavascriptCompressor',
  'javascript_compressor.options' => 
  array (
    'minify' => true,
    'black_list' => 
    array (
      0 => 'jquery.tree.min.js',
    ),
    'gz_compression' => false,
  ),
  'cache_manager.class' => 'dmCacheManager',
  'cache_manager.options' => 
  array (
    'meta_cache_class' => 'dmMetaCache',
  ),
  'filesystem.class' => 'dmFilesystem',
  'mime_type_resolver.class' => 'dmMimeTypeResolver',
  'event_log.class' => 'dmEventLog',
  'event_log.options' => 
  array (
    'name' => 'Events',
    'file' => 'data/dm/log/event.log',
    'entry_service_name' => 'event_log_entry',
    'rotation' => true,
    'max_size_kilobytes' => 1024,
    'ignore_models' => 
    array (
    ),
    'ignore_internal_actions' => true,
    'enabled' => true,
  ),
  'event_log_entry.class' => 'dmEventLogEntry',
  'request_log.class' => 'dmRequestLog',
  'request_log.options' => 
  array (
    'name' => 'Requests',
    'file' => 'data/dm/log/request.log',
    'entry_service_name' => 'request_log_entry',
    'rotation' => true,
    'max_size_kilobytes' => 1024,
    'enabled' => true,
  ),
  'request_log_entry.class' => 'dmRequestLogEntry',
  'browser.class' => 'dmBrowser',
  'browser.user_agent_string' => NULL,
  'user_agent_parser.class' => 'dmUserAgentParser',
  'page_tree_watcher.class' => 'dmPageTreeWatcher',
  'page_tree_watcher.options' => 
  array (
    'use_thread' => 'auto',
  ),
  'file_backup.class' => 'dmFileBackup',
  'file_backup.options' => 
  array (
    'dir' => 'data/dm/backup/filesystem',
  ),
  'helper.class' => 'dmHelper',
  'helper.options' => 
  array (
    'use_beaf' => false,
  ),
  'widget_type_manager.class' => 'dmWidgetTypeManager',
  'widget_type_manager.options' => 
  array (
    'config_file' => 'config/dm/widget_types.yml',
  ),
  'page_i18n_builder.class' => 'dmPageI18nBuilder',
  'page_i18n_builder.options' => 
  array (
    'activate_new_translations' => true,
  ),
  'project_loremizer.class' => 'dmProjectLoremizer',
  'project_loremizer.options' => 
  array (
    'nb_records_per_table' => 10,
  ),
  'table_loremizer.class' => 'dmTableLoremizer',
  'table_loremizer.options' => 
  array (
    'nb_records' => 10,
    'create_associations' => true,
  ),
  'record_loremizer.class' => 'dmRecordLoremizer',
  'record_loremizer.options' => 
  array (
    'override' => false,
    'create_associations' => true,
  ),
  'test_functional.class' => 'dmTestFunctional',
  'sf_browser.class' => 'dmSfBrowser',
  'doctrine_pager.class' => 'dmDoctrinePager',
  'web_browser.class' => 'dmWebBrowser',
  'web_browser.options' => 
  array (
    'default_headers' => 
    array (
    ),
    'adapter_class' => NULL,
    'adapter_options' => 
    array (
    ),
  ),
  'menu.class' => 'dmMenu',
  'menu.options' => 
  array (
  ),
  'page_tree_view.class' => 'dmFrontPageTreeView',
  'page_tree_view.options' => 
  array (
  ),
  'download.class' => 'dmDownloadResponse',
  'download.options' => 
  array (
  ),
  'data_load.class' => 'dmDataLoad',
  'markdown_translator.class' => 'dmMarkdownTranslator',
  'markdown_translator.options' => 
  array (
    'messages' => 
    array (
      0 => 'Heading 2',
      1 => 'Heading 3',
      2 => 'Heading 4',
      3 => 'Bold',
      4 => 'Italic',
      5 => 'Bulleted List',
      6 => 'Numeric List',
      7 => 'Link',
      8 => 'Enlarge the editor',
    ),
  ),
  'layout_helper.options' => 
  array (
  ),
  'browser_check.class' => 'dmBrowserCheck',
  'page_routing.class' => 'dmPageRouting',
  'page_routing.options' => 
  array (
  ),
  'html_sitemap.class' => 'dmFrontHtmlSitemap',
  'page_not_found_handler.class' => 'dmPageNotFoundHandler',
  'form_manager.class' => 'dmFormManager',
  'link_tag_record.class' => 'dmFrontLinkTagRecord',
  'link_tag_record.options' => 
  array (
    'current_span' => '1',
    'use_page_title' => '1',
  ),
  'link_tag_page.class' => 'dmFrontLinkTagPage',
  'link_tag_page.options' => 
  array (
    'current_span' => '1',
    'use_page_title' => '1',
  ),
  'link_tag_media.class' => 'dmFrontLinkTagMedia',
  'link_tag_media.options' => 
  array (
  ),
  'link_tag_action.class' => 'dmFrontLinkTagAction',
  'link_tag_action.options' => 
  array (
  ),
  'link_tag_uri.class' => 'dmFrontLinkTagUri',
  'link_tag_uri.options' => 
  array (
    'external_blank' => NULL,
  ),
  'link_tag_route.class' => 'dmFrontLinkTagRoute',
  'link_tag_route.options' => 
  array (
  ),
  'link_tag_error.class' => 'dmFrontLinkTagError',
  'link_tag_error.options' => 
  array (
  ),
  'link_resource.class' => 'dmFrontLinkResource',
  'link_tag_factory.class' => 'dmFrontLinkTagFactory',
  'asset_config.class' => 'dmFrontAssetConfig',
  'theme_manager.class' => 'dmThemeManager',
  'widget_view.class' => 'dmWidgetBaseView',
  'layout_helper.class' => 'dmFrontLayoutHelper',
  'page_helper.class' => 'dmFrontPageBaseHelper',
  'page_helper.view_class' => 'dmFrontPageViewHelper',
  'page_helper.edit_class' => 'dmFrontPageEditHelper',
  'page_helper.options' => 
  array (
    'widget_css_class_pattern' => '%module%_%action%',
  ),
  'widget_renderer.class' => 'dmFrontWidgetRenderer',
  'zone_form.class' => 'DmZoneFrontForm',
  'front_add_menu.class' => 'dmFrontAddMenu',
  'front_code_editor_file_menu.class' => 'dmFrontCodeEditorFileMenu',
  'front_clipboard.class' => 'dmFrontUserClipboard',
  'front_pager_view.class' => 'dmFrontPagerView',
  'front_pager_view.options' => 
  array (
  ),
  'sitemap_menu.class' => 'dmSitemapMenu',
  'helper_extension.class' => 'dmFrontHelperExtension',
  'tool_bar_view.class' => 'dmFrontToolBarView',
);
  }
}
