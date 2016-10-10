<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nutrition Log'), ['action' => 'edit', $nutritionLog->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nutrition Log'), ['action' => 'delete', $nutritionLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutritionLog->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sport Nutrition'), ['controller' => 'SportNutrition', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nutritionLog view large-9 medium-8 columns content">
    <h3><?= h($nutritionLog->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sport Nutrition') ?></th>
            <td><?= $nutritionLog->has('sport_nutrition') ? $this->Html->link($nutritionLog->sport_nutrition->name, ['controller' => 'SportNutrition', 'action' => 'view', $nutritionLog->sport_nutrition->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= $nutritionLog->has('day') ? $this->Html->link($nutritionLog->day->date, ['controller' => 'Days', 'action' => 'view', $nutritionLog->day->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($nutritionLog->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nutritionLog->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($nutritionLog->time) ?></td>
        </tr>
    </table>
</div>
