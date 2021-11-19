<?php

namespace ECInternet\Analysis\Block\Adminhtml\Analysis;

class Index extends \Magento\Backend\Block\Template
{
    const XML_PATH_MINIFY_CSS             = 'dev/css/minify_files';

    const XML_PATH_MINIFY_JS              = 'dev/js/minify_files';

    const XML_PATH_MINIFY_HTML            = 'dev/template/minify_html';

    const XML_PATH_FORCED_PASSWORD_CHANGE = 'admin/security/password_is_forced';

    /**
     * Get CSS minification setting (defaults to no)
     *
     * @return int
     */
    public function getCssMinificationResult()
    {
        if ($value = $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_CSS)) {
            return $value;
        }

        return 0;
    }

    /**
     * Get JS minification setting (defaults to no)
     *
     * @return int
     */
    public function getJsMinificationResult()
    {
        if ($value = $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_JS)) {
            return $value;
        }

        return 0;
    }

    /**
     * Get HTML minification setting (defaults to no)
     *
     * @return int
     */
    public function getHtmlMinificationResult()
    {
        if ($value = $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_HTML)) {
            return $value;
        }

        return 0;
    }

    public function getForcedPasswordResult()
    {
        if ($value = $this->_scopeConfig->getValue(static::XML_PATH_FORCED_PASSWORD_CHANGE)) {
            return $value;
        }

        return 1;
    }
}