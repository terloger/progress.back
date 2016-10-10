<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Values Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="valuesLog index large-9 medium-8 columns content">
    <h3><?= __('Values Log') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($valuesLog as $valuesLog): ?>
            <tr>
                <td><?= $this->Number->format($valuesLog->id) ?></td>
                <td><?= $valuesLog->has('unit') ? $this->Html->link($valuesLog->unit->name, ['controller' => 'Units', 'action' => 'view', $valuesLog->unit->id]) : '' ?></td>
                <td><?= $valuesLog->has('day') ? $this->Html->link($valuesLog->day->date, ['controller' => 'Days', 'action' => 'view', $valuesLog->day->id]) : '' ?></td>
                <td><?= h($valuesLog->time) ?></td>
                <td><?= h($valuesLog->value) ?></td>
                <td><?= h($valuesLog->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $valuesLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $valuesLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $valuesLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $valuesLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
