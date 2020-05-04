<?php


namespace App\Controller;


class HelloController extends AppController
{
    public function initialize()
    {
        $this->name = 'Hello';
        $this->viewBuilder()->autoLayout(true);
        $this->viewBuilder()->layout('Hello');
    }

    public function index()
    {
        $result = "";
        if ($this->request->isPost()) {
            $result = "<pre>※送信された情報<br>";
            foreach ($this->request->data['HelloForm'] as $key => $value) {
                $result .= $key . '=>' . $value;
            }
            $result .= '<pre>';
        } else {
            $result = "＊何か書いて送信してください";
        }
        $this->set('result', $result);
    }

    /**
     *
     */
    public function sendForm()
    {
        $str = $this->request->data('text1');
        if ($str != "") {
            $result = "you type: " . $str;
        } else {
            $result = "empty.";
        }
        $this->set('result', $result);
    }
}