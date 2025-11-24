<?php $__env->startSection('content'); ?>
<div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6 space-y-4">
    <!-- Profile Header -->
    <div class="flex items-center space-x-4">
        <img src="<?php echo e($user->profile->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name)); ?>"
             alt="Avatar" class="w-20 h-20 rounded-full border border-gray-300 dark:border-gray-600">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100"><?php echo e($user->name); ?></h2>
            <p class="text-gray-500 dark:text-gray-400">{{ Str::slug($user->name) }}</p>
        </div>
    </div>

    <!-- Tweets -->
    <div class="space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 shadow hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                <p class="text-gray-800 dark:text-gray-200"><?php echo e($tweet->content); ?></p>
                <div class="text-gray-500 text-sm mt-2"><?php echo e($tweet->created_at->diffForHumans()); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500 dark:text-gray-400">This user hasn’t posted any tweets yet.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/icyjemtalay/chirper/resources/views/profile/show.blade.php ENDPATH**/ ?>