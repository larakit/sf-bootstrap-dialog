<?php
/**
 * Created by Larakit.
 * Link: http://github.com/larakit
 * User: Alexey Berdnikov
 * Date: 13.07.16
 * Time: 13:38
 */

namespace BootstrapDialog;

class BootstrapDialog {

    protected $title;
    protected $message;
    protected $type     = 'type-default';
    protected $size     = 'size-normal';
    protected $cssClass = null;
    protected $spinicon = null;
    protected $data     = [];
    protected $onshow   = null;

    function send() {
        $ret = [];
        $ret[] = 'title: \'WARNING\'';
        $ret[] = 'onshow: function alert(\'123\')';
        return '{'.implode(','.PHP_EOL, $ret).'}';
    }

    /**
     * @return null
     */
    public function getOnshow() {
        return $this->onshow;
    }

    /**
     * @param null $onshow
     *
     * @return BootstrapDialog;
     */
    public function setOnshow($onshow) {
        $this->onshow = $onshow;

        return $this;
    }

    /**
     * @return null
     */
    public function getSpinicon() {
        return $this->spinicon;
    }

    /**
     * Specify what icon to be used as the spinning icon when button's 'autospin' is set to true.
     *
     * @param null $spinicon
     *
     * @return BootstrapDialog;
     */
    public function setSpinicon($spinicon) {
        $this->spinicon = $spinicon;

        return $this;
    }

    protected $closable = true;

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return BootstrapDialog;
     */
    public function setDataItem($k, $v) {
        $this->data[$k] = $v;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isClosable() {
        return $this->closable;
    }

    /**
     * @param boolean $closable
     *
     * @return BootstrapDialog;
     */
    public function setClosable($closable) {
        $this->closable = $closable;

        return $this;
    }

    /**
     * @return string
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setSizeNormal() {
        $this->size = 'size-normal';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setSizeWide() {
        $this->size = 'size-wide';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setSizeLarge() {
        $this->size = 'size-large';

        return $this;
    }

    /**
     * @return null
     */
    public function getCssClass() {
        return $this->cssClass;
    }

    /**
     * @param null $cssClass
     *
     * @return BootstrapDialog;
     */
    public function setCssClass($cssClass) {
        $this->cssClass = $cssClass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypeInfo() {
        $this->type = 'type-info';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypeDefault() {
        $this->type = 'type-default';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypePrimary() {
        $this->type = 'type-primary';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypeSuccess() {
        $this->type = 'type-success';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypeWarning() {
        $this->type = 'type-warning';

        return $this;
    }

    /**
     * @return BootstrapDialog;
     */
    public function setTypeDanger() {
        $this->type = 'type-danger';

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param mixed $message
     *
     * @return BootstrapDialog;
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return BootstrapDialog;
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }
}