namespace App\Models;

trait ValidateOnSave
{
    protected function rules(){
        return [
        ];
    }

    public function save(array $options = [])
    {
        $rules = $this->rules();
        if (!empty($rules)) {
            $subject   = $this->attributes;
            $validator = Validator::make($subject, $rules);

            if ($validator->fails()) {
                // テスト時・コンソール実行時にはエラー内容を画面に表示する
                if (app()->environment('testing') || app()->runningInConsole()) {
                    $errors = $validator->errors();
                    foreach ($rules as $attr => $rule) {
                        if ($errors->has($attr)) {
                            echo "\n\n------------ VALIDATION ERROR\n";
                            foreach ($errors->get($attr) as $message) {
                                echo "$message\n";
                            }
                            echo "RULE : '$attr' => '$rule' \n";
                            echo "VALUE: '$attr' => " . (array_key_exists($attr, $subject) ? var_export($subject[$attr], true) : 'undefined') . "\n";
                        }
                    }
                }
                throw new ValidationException($validator);
            }
        }

        return parent::save($options);
    }
}
