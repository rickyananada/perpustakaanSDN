<table class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Nama Anggota</th>
            <th class="min-w-125px">Jenis Kelamin</th>
            <th class="min-w-125px">Alamat</th>
            <th class="text-end min-w-70px">Aksi</th>
        </tr>
    </thead>
    <tbody class="fw-bold text-gray-600">
        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <?php echo e($item->name); ?>

            </td>

            <td class="w-35px me-3">
                <?php echo e(($item->gender == 'male') ? 'Laki - Laki' : 'Perempuan'); ?>

            </td>

            <td>
                <?php echo e($item->address); ?>

            </td>
            
            <td class="text-end">
                <div class="btn-group" role="group">
                    <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        Aksi
                        <span class="svg-icon svg-icon-5 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                    </button>
                    <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" aria-labelledby="aksi">
                        <div class="menu-item px-3">
                            <a href="javascript:;" onclick="load_input('<?php echo e(route('web.member.edit',$item->id)); ?>');" class="menu-link px-3">Ubah</a>
                        </div>
                        <div class="menu-item px-3">
                            <a href="javascript:;" onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','<?php echo e(route('web.member.destroy',$item->id)); ?>');" class="menu-link px-3">Hapus</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($collection->links('theme.web.pagination')); ?><?php /**PATH D:\KULIAH\DICODING\laragon\www\perpustakaanSDN\resources\views/pages/borrow/list.blade.php ENDPATH**/ ?>