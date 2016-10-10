<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nutritionLog index large-9 medium-8 columns content">
    <h3><?= __('Nutrition Log') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sport_nutrition_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nutritionLog as $nutritionLog): ?>
            <tr>
                <td><?= $this->Number->format($nutritionLog->id) ?></td>
                <td><?= $nutritionLog->has('sport_nutrition') ? $this->Html->link($nutritionLog->sport_nutrition->name, ['controller' => 'SportNutrition', 'action' => 'view', $nutritionLog->sport_nutrition->id]) : '' ?></td>
                <td><?= $nutritionLog->has('day') ? $this->Html->link($nutritionLog->day->date, ['controller' => 'Days', 'action' => 'view', $nutritionLog->day->id]) : '' ?></td>
                <td><?= h($nutritionLog->time) ?></td>
                <td><?= h($nutritionLog->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $nutritionLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nutritionLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nutritionLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutritionLog->id)]) ?>
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
