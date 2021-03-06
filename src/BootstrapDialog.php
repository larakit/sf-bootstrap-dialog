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

    protected $_ret        = [];
    protected $autodestroy = true;
    protected $buttons     = [];
    protected $closable = true;
    protected $cssClass    = null;
    protected $data        = [];
    protected $description = null;
    protected $message;
    protected $nl2br       = false;
    protected $onhidden    = null;
    protected $onhide      = null;
    protected $onshow      = null;
    protected $onshown     = null;
    protected $size        = 'size-normal';
    protected $spinicon    = 'glyphicon glyphicon-asterisk';
    protected $title;
    protected $type        = 'type-default';

    static function factory() {
        return new \BootstrapDialog\BootstrapDialog();
    }

    function addButton(BootstrapDialogButton $button) {
        $this->buttons[] = $button->get();

        return $this;
    }

    /**
     * @param null $onshown
     *
     * @return BootstrapDialog;
     */
    public function setOnshown($onshown) {
        $this->onshown = $onshown;

        return $this;
    }

    /**
     * @param null $onhide
     *
     * @return BootstrapDialog;
     */
    public function setOnhide($onhide) {
        $this->onhide = $onhide;

        return $this;
    }

    /**
     * @param null $onhidden
     *
     * @return BootstrapDialog;
     */
    public function setOnhidden($onhidden) {
        $this->onhidden = $onhidden;

        return $this;
    }

    /**
     * @param boolean $autodestroy
     *
     * @return BootstrapDialog;
     */
    public function setAutodestroy($autodestroy) {
        $this->autodestroy = $autodestroy;

        return $this;
    }

    /**
     * @param null $description
     *
     * @return BootstrapDialog;
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * @param boolean $nl2br
     *
     * @return BootstrapDialog;
     */
    public function setNl2br($nl2br) {
        $this->nl2br = $nl2br;

        return $this;
    }

    function send() {
        $this->responseProperty('type');
        $this->responseProperty('size');
        $this->responseProperty('cssClass');
        $this->responseProperty('title');
        $this->responseProperty('message');
        $this->responseProperty('buttons', true, false, true);
        $this->responseProperty('closable');
        $this->responseProperty('spinicon');
        $this->responseProperty('data');
        $this->responseFunction('onshow');
        $this->responseFunction('onshown', true);
        $this->responseFunction('onhide');
        $this->responseFunction('onhidden');
        $this->responseProperty('autodestroy');
        $this->responseProperty('description');
        $this->responseProperty('nl2br');

        return response('BootstrapDialog.show({' . implode(',', $this->_ret) . '})',
            200,
            ['Content-Type' => 'application/json',]
        );

    }

    protected function responseProperty($name, $is_implode = false, $is_encode = true, $is_array = false) {
        $val = $this->$name;
        if(is_null($val)) {
            return null;
        }
        if($is_implode) {
            $val = implode(',', $val);
        }
        if($is_encode) {
            $val = json_encode($val);
        }
        if($is_array) {
            $val = '[' . $val . ']';
        }
        $this->_ret[$name] = '"' . $name . '":' . $val;
    }

    protected function responseFunction($name, $ls_js = false) {
        $val = $this->$name;
        if(!$val && !$ls_js) {
            return null;
        }
        $this->_ret[$name] = '"' . $name . '":' . 'function(dialog){' . ($ls_js ? 'LarakitJs.fire();
        var $form = dialog.getModalBody().find("form");
        $form.on("submit", function(){
            dialog.getModalFooter().find(".js-submit").trigger("click");
            return false;
        });
        ' : '') . $val . '}';
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
     * @param boolean $closable
     *
     * @return BootstrapDialog;
     */
    public function setClosable($closable) {
        $this->closable = (bool) $closable;

        return $this;
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
     * @return BootstrapDialog;
     */
    public function setSizeSmall() {
        $this->size = 'size-small';

        return $this;
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
     * @param mixed $message
     *
     * @return BootstrapDialog;
     */
    public function setMessage($message) {
        $this->message = $message . '';

        return $this;
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