<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sport Nutrition'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sportNutrition index large-9 medium-8 columns content">
    <h3><?= __('Sport Nutrition') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sportNutrition as $sportNutrition): ?>
            <tr>
                <td><?= $this->Number->format($sportNutrition->id) ?></td>
                <td><?= h($sportNutrition->name) ?></td>
                <td><?= h($sportNutrition->color) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sportNutrition->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sportNutrition->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sportNutrition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sportNutrition->id)]) ?>
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
