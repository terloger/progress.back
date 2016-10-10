<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sport Nutrition'), ['action' => 'edit', $sportNutrition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sport Nutrition'), ['action' => 'delete', $sportNutrition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sportNutrition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sport Nutrition'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sport Nutrition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutrition Log'), ['controller' => 'NutritionLog', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sportNutrition view large-9 medium-8 columns content">
    <h3><?= h($sportNutrition->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sportNutrition->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($sportNutrition->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sportNutrition->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nutrition Log') ?></h4>
        <?php if (!empty($sportNutrition->nutrition_log)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sport Nutrition Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Timestamp') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sportNutrition->nutrition_log as $nutritionLog): ?>
            <tr>
                <td><?= h($nutritionLog->id) ?></td>
                <td><?= h($nutritionLog->sport_nutrition_id) ?></td>
                <td><?= h($nutritionLog->day_id) ?></td>
                <td><?= h($nutritionLog->user_id) ?></td>
                <td><?= h($nutritionLog->timestamp) ?></td>
                <td><?= h($nutritionLog->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NutritionLog', 'action' => 'view', $nutritionLog->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NutritionLog', 'action' => 'edit', $nutritionLog->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NutritionLog', 'action' => 'delete', $nutritionLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutritionLog->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
