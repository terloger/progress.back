<?php

namespace App\Controller\Api;

use App\Controller\Api\DataAppController;

class ProgressDataController extends DataAppController {

    public function dayPermValues() {
    	$this->loadModel('ValuesLog');

		$limit = @$_REQUEST['limit'];
		$limit = (!is_null($limit) ? $limit : 30);

		$units = [1,2,3];

		$data = $this->_getData($units, $limit);

		$success = true;
		$total = $data->count();

        $this->set(compact('data', 'success', 'total'));
        $this->set('_serialize', ['success', 'data', 'total']);
    }

	public function valuesLogHistory() {
    	$this->loadModel('ValuesLog');

		$units = $_REQUEST['units'];
		$units = explode(',', $units);

		$limit = @$_REQUEST['limit'];
		$limit = (!is_null($limit) ? $limit : 30);		

		$data = $this->_getData($units, $limit);

		$success = true;
		$total = $data->count();

        $this->set(compact('data', 'success', 'total'));
        $this->set('_serialize', ['success', 'data', 'total']);
    }

	protected function _getData($units, $limit) {
		$query = $this->ValuesLog->find()
			->innerJoin(
				['Days' => 'days'],
				[
					'ValuesLog.day_id = Days.id',
					'Days.user_id' => $this->Auth->user('id')
				]
			)
	        ->where([
				'ValuesLog.unit_id IN' => $units
			])
			->group(['ValuesLog.day_id', 'ValuesLog.unit_id'])
			->order(['Days.date' => 'DESC']);

		$unit = [];
		foreach ($units as $key => $value) {
			$unit[$key] = $query->newExpr()->addCase([$query->newExpr()->add('ValuesLog.unit_id = ' . $value)], [ new \Cake\Database\Expression\IdentifierExpression('ValuesLog.value'), 0], ['integer','integer']);
		}

		$selectParams = ['date' => 'Days.date'];
		
		foreach ($units as $key => $value) {
			$selectParams['unit_' . $value] = $unit[$key];
		}

		$sub = $query->select($selectParams);

		$lastSelectParams = [
			'id' => $query->func()->concat([
					'(UNIX_TIMESTAMP(sub.date))' => 'literal'
				]),
			'date' => 'sub.date'
		];

		foreach ($units as $key => $value) {
			$lastSelectParams['unit_' . $value] = $query->func()->max('sub.unit_' . $value);
		}

		$data = $this->ValuesLog->find()
			->from(['sub' => $sub])
			->group(['sub.date'])
			->order(['sub.date' => 'DESC'])
			->select($lastSelectParams);
		
		if ($limit) {
			$data->limit($limit);
		}
		
		return $data;
	}
}