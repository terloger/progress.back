<?php

namespace App\Crud\Action;
use Cake\I18n\Time;

class DayAction extends \Crud\Action\ViewAction {

    /**
    * Generic handler for all HTTP verbs
    *
    * @return void
    */
    protected function _handle($id = null) {
        $subject = $this->_subject();
        $subject->set(['id' => $id]);

        $this->_findDay($id, $subject);
        $this->_trigger('beforeRender', $subject);
    }
    
    protected function _findDay($date, \Crud\Event\Subject $subject) {
        $repository = $this->_table();

        $query = $repository->find($this->findMethod());
        $query->where(['Days.date' => Time::parse($date)]);

        $subject->set([
            'repository' => $repository,
            'query' => $query
        ]);

        $this->_trigger('beforeFind', $subject);
        $entity = $subject->query->first();

        if (!$entity) {
            return $this->_notFound($date, $subject);
        }

        $subject->set(['entity' => $entity, 'success' => true]);
        $this->_trigger('afterFind', $subject);

        return $entity;
    }

}