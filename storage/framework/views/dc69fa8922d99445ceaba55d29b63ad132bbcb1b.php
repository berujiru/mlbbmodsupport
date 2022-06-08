
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.mailbox'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="email-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
    <div class="email-content">
        <div class="p-4 pb-0">
            <div class="border-bottom border-bottom-dashed">
                <div class="row mt-n2 mb-3 mb-sm-0">
                    <div class="col col-sm-auto order-1 d-block d-lg-none">
                        <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 email-menu-btn">
                            <i class="ri-menu-2-fill align-bottom"></i>
                        </button>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="col">
                        <ul class="nav nav-tabs nav-tabs-custom nav-success gap-1 text-center border-bottom-0"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fw-semibold active" href="#">
                                    <i class="ri-inbox-fill align-bottom d-inline-block"></i>
                                    <span class="ms-1 d-none d-sm-inline-block">QA Scores</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" href="#">
                                    <i class="ri-file-edit-line align-bottom d-inline-block"></i>
                                    <span class="ms-1 d-none d-sm-inline-block">NTE <span
                                    class="bg-success badge me-2">soon</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="text-muted">1-50 of 154</div>
                    </div>
                </div>
            </div>

            <div class="message-list-content mx-n4 px-4 message-list-scroll" data-simplebar>
                <ul class="message-list">
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck20">
                                <label class="form-check-label" for="flexCheck20"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Peter, me (3)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Hello – <span class="teaser">Trip home from
                                    Colombo has been arranged, then Jenna
                                    will come get me from Stockholm. :)</span>
                            </a>
                            <div class="date">Mar 6</div>
                        </div>
                    </li>

                    <li class="unread">
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck17">
                                <label class="form-check-label" for="flexCheck17"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15 active">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">me, Susanna (7)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-warning badge me-2">Freelance</span>Since you asked... and i'm
                                inconceivably bored at the train station –
                                <span class="teaser">Alright thanks. I'll have to re-book that somehow,
                                    i'll get back to you.</span>
                            </a>
                            <div class="date">Mar. 6</div>
                        </div>
                    </li>

                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck16">
                                <label class="form-check-label" for="flexCheck16"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Web Support Dennis</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Re: New mail settings –
                                <span class="teaser">Will you answer him asap?</span>
                            </a>
                            <div class="date">Mar 7</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck15">
                                <label class="form-check-label" for="flexCheck15"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">me, Peter (2)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-info badge me-2">Support</span>Off on Thursday -
                                <span class="teaser">Eff that place, you might as well stay here with
                                    us instead! Sent from my iPhone 4 4 mar 2014 at 5:55 pm</span>
                            </a>
                            <div class="date">Mar 4</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck14">
                                <label class="form-check-label" for="flexCheck14"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Medium</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-primary badge me-2">Social</span>This Week's Top Stories –
                                <span class="teaser">Our top pick for you on Medium this week The Man
                                    Who Destroyed America’s Ego</span>
                            </a>
                            <div class="date">Feb 28</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck13">
                                <label class="form-check-label" for="flexCheck13"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn active fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Death to Stock</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Montly High-Res Photos –
                                <span class="teaser">To create this month's pack, we hosted a party
                                    with local musician Jared Mahone here in Columbus, Ohio.</span>
                            </a>
                            <div class="date">Feb 28</div>
                        </div>
                    </li>

                    <li class="unread">
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck12">
                                <label class="form-check-label" for="flexCheck12"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Randy, me (5)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-success badge me-2">Family</span>Last pic over my village –
                                <span class="teaser">Yeah i'd like that! Do you remember the video you
                                    showed me of your train ride between Colombo and Kandy? The one with the
                                    mountain view? I would love to see that one again!</span>
                            </a>
                            <div class="date">5:01 am</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck11">
                                <label class="form-check-label" for="flexCheck11"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Andrew Zimmer</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Mochila Beta: Subscription
                                Confirmed
                                – <span class="teaser">You've been confirmed! Welcome to the ruling
                                    class of the inbox. For your records, here is a copy of the information you
                                    submitted to us...</span>
                            </a>
                            <div class="date">Mar 8</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck10">
                                <label class="form-check-label" for="flexCheck10"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn active fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Infinity HR</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Sveriges Hetaste sommarjobb –
                                <span class="teaser">Hej Nicklas Sandell! Vi vill bjuda in dig till
                                    "First tour 2014", ett rekryteringsevent som erbjuder jobb på 16
                                    semesterorter iSverige.</span>
                            </a>
                            <div class="date">Mar 8</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck09">
                                <label class="form-check-label" for="flexCheck09"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Revibe</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-danger badge me-2">Friends</span>Weekend on Revibe –
                                <span class="teaser">Today's Friday and we thought maybe you want some
                                    music inspiration for the weekend. Here are some trending tracks and
                                    playlists we think you should give a listen!</span>
                            </a>
                            <div class="date">Feb 27</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck08">
                                <label class="form-check-label" for="flexCheck08"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Erik, me (5)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Regarding our meeting –
                                <span class="teaser">That's great, see you on Thursday!</span>
                            </a>
                            <div class="date">Feb 24</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck07">
                                <label class="form-check-label" for="flexCheck07"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">KanbanFlow</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-primary badge me-2">Social</span>Task assigned: Clone ARP's
                                website
                                – <span class="teaser">You have been assigned a task by Alex@Work on
                                    the board Web.</span>
                            </a>
                            <div class="date">Feb 24</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck06">
                                <label class="form-check-label" for="flexCheck06"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Tobias Berggren</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Let's go fishing! –
                                <span class="teaser">Hey, You wanna join me and Fred at the lake
                                    tomorrow? It'll be awesome.</span>
                            </a>
                            <div class="date">Feb 23</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck05">
                                <label class="form-check-label" for="flexCheck05"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn active fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Charukaw, me (7)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Hey man – <span class="teaser">Nah man sorry
                                    i don't. Should i get it?</span>
                            </a>
                            <div class="date">Feb 23</div>
                        </div>
                    </li>
                    <li class="unread">
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck04">
                                <label class="form-check-label" for="flexCheck04"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">me, Peter (5)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject"><span
                                    class="bg-info badge me-2">Support</span>Home again! – <span class="teaser">That's
                                    just perfect! See you tomorrow.</span>
                            </a>
                            <div class="date">Feb 21</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck03">
                                <label class="form-check-label" for="flexCheck03"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn active fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Stack Exchange</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">1 new items in your
                                Stackexchange inbox
                                – <span class="teaser">The following items were added to your Stack
                                    Exchange global inbox since you last checked it.</span>
                            </a>
                            <div class="date">Feb 21</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck02">
                                <label class="form-check-label" for="flexCheck02"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">Google Drive Team</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">You can now use your storage
                                in Google
                                Drive – <span class="teaser">Hey Nicklas Sandell! Thank you for
                                    purchasing extra storage space in Google Drive.</span>
                            </a>
                            <div class="date">Feb 20</div>
                        </div>
                    </li>
                    <li>
                        <div class="col-mail col-mail-1">
                            <div class="form-check checkbox-wrapper-mail fs-14">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheck01">
                                <label class="form-check-label" for="flexCheck01"></label>
                            </div>
                            <button type="button" class="btn avatar-xs p-0 favourite-btn fs-15">
                                <i class="ri-star-fill"></i>
                            </button>
                            <a href="javascript: void(0);" class="title">me, Susanna (11)</a>
                        </div>
                        <div class="col-mail col-mail-2">
                            <a href="javascript: void(0);" class="subject">Train/Bus – <span class="teaser">Yes ok,
                                    great! I'm not stuck in Stockholm anymore,
                                    we're making progress.</span>
                            </a>
                            <div class="date">Feb 19</div>
                        </div>
                    </li>

                    <li class="bg-transparent text-center">
                        <button type="button" class="btn btn-soft-info btn-rounded btn-sm px-2"><i
                                class="mdi mdi-spin mdi-loading me-2"></i>Load More</button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- end email-content -->

    <div class="email-detail-content">
        <div class="p-4 d-flex flex-column h-100">
            <div class="pb-4 border-bottom border-bottom-dashed">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <button type="button" class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-email">
                                <i class="ri-close-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-n4 px-4 email-detail-content-scroll" data-simplebar>
                <div class="mt-4 mb-3">
                    <h5 class="fw-bold">Title</h5>
                </div>

                <div class="accordion accordion-flush">
                    <div class="accordion-item border-dashed">
                        <div class="accordion-header">
                            <a role="button" class="btn w-100 text-start px-0 bg-transparent shadow-none"
                                data-bs-toggle="collapse" href="#email-collapseOne" aria-expanded="true"
                                aria-controls="email-collapseOne">
                                <div class="d-flex align-items-center text-muted">
                                    <div class="flex-shrink-0 avatar-xs me-3">
                                        <img src="<?php echo e(URL::asset('assets/images//users/avatar-3.jpg')); ?>" alt=""
                                            class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-14 text-truncate mb-0">MLBBMODSUPPORT TEAM</h5>
                                        <div class="text-truncate fs-12">to: me</div>
                                    </div>
                                    <div class="flex-shrink-0 align-self-start">
                                        <div class="text-muted fs-12">09 Jan 2022, 11:12 AM</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div id="email-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body text-body px-0">
                                <div>
                                    <p>Hi,</p>
                                    <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque
                                        arcu leo, facilisis in fringilla id, luctus in tortor.
                                    </p>
                                    <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam
                                        eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed
                                        bibendum orci non tincidunt ultrices.</p>
                                    <p>Sincerly,</p>

                                    <div class="d-flex gap-3">
                                        <div class="border rounded avatar-xl h-auto">
                                            <img src="<?php echo e(URL::asset('assets/images/small/img-2.jpg')); ?>" alt=""
                                                class="img-fluid rouned-top">
                                            <div class="py-2 text-center">
                                                <a href="" class="d-block fw-semibold">Download</a>
                                            </div>
                                        </div>
                                        <div class="border rounded avatar-xl h-auto">
                                            <img src="<?php echo e(URL::asset('assets/images/small/img-6.jpg')); ?>" alt=""
                                                class="img-fluid rouned-top">
                                            <div class="py-2 text-center">
                                                <a href="" class="d-block fw-semibold">Download</a>
                                            </div>
                                        </div>
                                    </div>

                                    --End Content --
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="mt-auto">
                <form class="mt-2">
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Reply :</label>
                        <textarea class="form-control border-bottom-0 rounded-top rounded-0 border"
                            id="exampleFormControlTextarea1" rows="3" placeholder="Enter message"></textarea>
                        <div class="bg-light px-2 py-1 rouned-bottom border">
                            <div class="row">
                                <div class="col">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm py-0 fs-15 btn-light"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Bold"><i
                                                class="ri-bold align-bottom"></i></button>
                                        <button type="button" class="btn btn-sm py-0 fs-15 btn-light"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Italic"><i
                                                class="ri-italic align-bottom"></i></button>
                                        <button type="button" class="btn btn-sm py-0 fs-15 btn-light"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Link"><i
                                                class="ri-link align-bottom"></i></button>
                                        <button type="button" class="btn btn-sm py-0 fs-15 btn-light"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Image"><i
                                                class="ri-image-2-line align-bottom"></i></button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success"><i
                                                class="ri-send-plane-2-fill align-bottom"></i></button>
                                        <button type="button"
                                            class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="ri-timer-line text-muted me-1 align-bottom"></i>
                                                    Schedule Send</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
    <!-- end email-detail-content -->
</div>
<!-- end email wrapper -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/libs/@ckeditor/@ckeditor.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/mailbox.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8\htdocs\mlbbmodsupport\resources\views/apps-mailbox.blade.php ENDPATH**/ ?>