<?php

namespace App\Controller\Api;

use App\Controller\Api\DataAppController;

class ProgressDataController extends DataAppController {

    public function dayPermValues() {
    	$this->loadModel('ValuesLog');

        $query = $this->ValuesLog->find()
		->innerJoin(
			['Days' => 'days'],
			[
				'ValuesLog.day_id = Days.id',
				'Days.user_id' => $this->Auth->user('id')
			]
		)
        ->where([
			'ValuesLog.unit_id IN' => [1,2,3]
		])
		->group(['ValuesLog.day_id', 'ValuesLog.unit_id'])
		->order(['Days.date' => 'DESC'])
		->limit(100);

		$unit1 = $query->newExpr()->addCase([$query->newExpr()->add('ValuesLog.unit_id = 1')], [ new \Cake\Database\Expression\IdentifierExpression('ValuesLog.value'), 0], ['integer','integer']);
		$unit2 = $query->newExpr()->addCase([$query->newExpr()->add('ValuesLog.unit_id = 2')], [ new \Cake\Database\Expression\IdentifierExpression('ValuesLog.value'), 0], ['integer','integer']);
		$unit3 = $query->newExpr()->addCase([$query->newExpr()->add('ValuesLog.unit_id = 3')], [ new \Cake\Database\Expression\IdentifierExpression('ValuesLog.value'), 0], ['integer','integer']);
		$sub = $query->select([
			'date' => 'Days.date',
			'unit_1' => $unit1,
			'unit_2' => $unit2,
			'unit_3' => $unit3
		]);

		$data = $this->ValuesLog->find()
		->from(['sub' => $sub])
		->group(['sub.date'])
		->order(['sub.date' => 'DESC'])
		->limit(30)
		->select([
			'id' => $query->func()->concat([
				'(UNIX_TIMESTAMP(sub.date))' => 'literal'
			]),
			'date' => 'sub.date',
			'unit_1' => $query->func()->max('sub.unit_1'),
			'unit_2' => $query->func()->max('sub.unit_2'),
			'unit_3' => $query->func()->max('sub.unit_3')
		]);

		$success = true;
		//debug($data);

        $this->set(compact('data', 'success'));
        $this->set('_serialize', ['success', 'data']);
    }

	public function valuesLogHistory() {
    	$this->loadModel('ValuesLog');

		$units = $_REQUEST['units'];
		$units = explode(',', $units);

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
		->order(['Days.date' => 'DESC'])
		->limit(100);

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
		->limit(30)
		->select($lastSelectParams);

		$success = true;
		//debug($data);

        $this->set(compact('data', 'success'));
        $this->set('_serialize', ['success', 'data']);
    }
}