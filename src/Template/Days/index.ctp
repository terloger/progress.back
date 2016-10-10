<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Day'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Values Log'), ['controller' => 'ValuesLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Values Log'), ['controller' => 'ValuesLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="days index large-9 medium-8 columns content">
    <h3><?= __('Days') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($days as $day): ?>
            <tr>
                <td><?= $this->Number->format($day->id) ?></td>
                <td><?= h($day->date) ?></td>
                <td><?= $day->has('user') ? $this->Html->link($day->user->name, ['controller' => 'Users', 'action' => 'view', $day->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $day->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $day->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $day->id], ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]) ?>
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
