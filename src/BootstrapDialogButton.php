<?php
/**
 * Created by Larakit.
 * Link: http://github.com/larakit
 * User: Alexey Berdnikov
 * Date: 13.07.16
 * Time: 13:38
 */

namespace BootstrapDialog;

class BootstrapDialogButton {

    protected $action   = 'dialog.close();';
    protected $cssClass = 'btn-default';
    protected $hotkey   = null;
    protected $label    = 'Cancel';

    function __construct($label = null) {
        if($label) {
            $this->label = $label;
        }
    }

    /**
     * @param null $label
     *
     * @return BootstrapDialogButton
     */
    static function factory($label = 'Закрыть') {
        return new \BootstrapDialog\BootstrapDialogButton($label);
    }

    function get() {
        $ret   = [];
        $ret[] = '"label":"' . $this->label . '"';
        $ret[] = '"action":' . 'function(dialog){' . $this->action . '}';
        if($this->hotkey) {
            $ret[] = '"hotkey":' . $this->hotkey . '';
        }
        $ret[] = '"cssClass":"' . $this->cssClass . '"';

        return '{' . implode(',', $ret) . '}';
    }

    public function setHotkeyEnter() {
        return $this->setHotkey(13);
    }

    /**
     * @param null $hotkey
     *
     * @return BootstrapDialogButton;
     */
    public function setHotkey($hotkey) {
        $this->hotkey = $hotkey;

        return $this;
    }

    /**
     * @param mixed $label
     *
     * @return BootstrapDialogButton;
     */
    public function setLabel($label) {
        $this->label = $label;

        return $this;
    }

    function addClassBtnPrimary() {
        return $this->addClass('btn-primary')
            ->removeClass('btn-default')
            ->removeClass('btn-success')
            ->removeClass('btn-danger')
            ->removeClass('btn-info')
            ->removeClass('btn-warning');
    }

    /**
     * Removes the given CSS class(es) from the element
     *
     * @param string|array $class Class name, multiple class names separated by
     *                            whitespace, array of class names
     *
     * @return $this
     */
    public function removeClass($class) {
        if(!is_array($class)) {
            $class = preg_split('/\s+/', $class, null, PREG_SPLIT_NO_EMPTY);
        }
        $curClass       = array_diff(
            preg_split(
                '/\s+/', $this->cssClass, null, PREG_SPLIT_NO_EMPTY
            ),
            $class
        );
        $this->cssClass = implode(' ', $curClass);

        return $this;
    }

    /**
     * Adds the given CSS class(es) to the element
     *
     * @param string|array $class Class name, multiple class names separated by
     *                            whitespace, array of class names
     *
     * @return $this
     */
    public function addClass($class) {
        if(!is_array($class)) {
            $class = preg_split('/\s+/', $class, null, PREG_SPLIT_NO_EMPTY);
        }
        $curClass = preg_split(
            '/\s+/', $this->cssClass, null, PREG_SPLIT_NO_EMPTY
        );
        foreach($class as $c) {
            if(!in_array($c, $curClass)) {
                $curClass[] = $c;
            }
        }
        $this->cssClass = implode(' ', $curClass);

        return $this;
    }

    function addClassBtnSuccess() {
        return $this->addClass('btn-success')
            ->removeClass('btn-default')
            ->removeClass('btn-primary')
            ->removeClass('btn-danger')
            ->removeClass('btn-info')
            ->removeClass('btn-warning');
    }

    function addClassBtnDanger() {
        return $this->addClass('btn-danger')
            ->removeClass('btn-default')
            ->removeClass('btn-success')
            ->removeClass('btn-primary')
            ->removeClass('btn-info')
            ->removeClass('btn-warning');
    }

    function addClassBtnInfo() {
        return $this->addClass('btn-info')
            ->removeClass('btn-default')
            ->removeClass('btn-success')
            ->removeClass('btn-danger')
            ->removeClass('btn-primary')
            ->removeClass('btn-warning');
    }

    function addClassBtnWarning() {
        return $this->addClass('btn-warning')
            ->removeClass('btn-default')
            ->removeClass('btn-success')
            ->removeClass('btn-danger')
            ->removeClass('btn-info')
            ->removeClass('btn-primary');
    }

    /**
     * @param mixed $action
     *
     * @return BootstrapDialogButton;
     */
    public function setAction($action) {
        $this->action = $action;

        return $this;
    }

    public function setActionFormSubmit() {
        return $this->setActionFile(base_path('vendor/larakit/lk-admin/src/javascripts/crud-form-submit.js'))
            ->addClass('js-submit')
//            ->setHotkeyEnter()
            ;
    }

    public function setActionFile($action_file) {
        $this->action = file_get_contents($action_file);

        return $this;
    }

}