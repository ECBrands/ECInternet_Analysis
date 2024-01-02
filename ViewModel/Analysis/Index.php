<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\Analysis\ViewModel\Analysis;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\User\Model\System\Config\Source\Password as PasswordConfig;

class Index implements ArgumentInterface
{
    const XML_PATH_MINIFY_CSS             = 'dev/css/minify_files';

    const XML_PATH_MINIFY_JS              = 'dev/js/minify_files';

    const XML_PATH_MINIFY_HTML            = 'dev/template/minify_html';

    const XML_PATH_PASSWORD_LIFETIME      = 'admin/security/password_lifetime';

    const XML_PATH_FORCED_PASSWORD_CHANGE = 'admin/security/password_is_forced';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $_scopeConfig;

    /**
     * @var \Magento\User\Model\System\Config\Source\Password
     */
    private $_passwordConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        PasswordConfig $password
    ) {
        $this->_scopeConfig    = $scopeConfig;
        $this->_passwordConfig = $password;
    }

    /**
     * Get CSS minification setting (defaults to no)
     *
     * @return int
     */
    public function getCssMinificationResult()
    {
        return $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_CSS);
    }

    /**
     * Get JS minification setting (defaults to no)
     *
     * @return int
     */
    public function getJsMinificationResult()
    {
        return $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_JS);
    }

    /**
     * Get HTML minification setting (defaults to no)
     *
     * @return int
     */
    public function getHtmlMinificationResult()
    {
        return $this->_scopeConfig->getValue(static::XML_PATH_MINIFY_HTML);
    }

    public function getPasswordLifetime()
    {
        return $this->_scopeConfig->getValue(static::XML_PATH_PASSWORD_LIFETIME);
    }

    public function getForcedPasswordResult()
    {
        $passwordConfig = $this->_passwordConfig->toOptionArray();
        $value          = $this->_scopeConfig->getValue(static::XML_PATH_FORCED_PASSWORD_CHANGE);

        if (isset($passwordConfig[$value])) {
            return $passwordConfig[$value];
        }

        return '';
    }
}
