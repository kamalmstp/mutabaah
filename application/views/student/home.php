<div class="app__content">
				<h3>Github Profile Card:</h3>

				<div class="card">
					<div class="card__spinner"></div>
					<div class="card__container">
						<img alt="avatar" class="card__img" src="" />
						<p class="card__title"></p>
						<p class="card__desc"></p>
						<p class="card__temp"><b>Company: </b> <span></span></p>
						<p class="card__following"><b>Following: </b> <span></span></p>
						<p class="card__followers"><b>Followers: </b> <span></span></p>
						<div class="add__to-card">
							<input type="text" class="add__input" placeholder="Enter a github username" /> <button class="add__btn">Add</button>
						</div>
					</div>
				</div>

				<div class="add__card">
					<h3>
						<a target="_blank" rel="noopener" href="https://developers.google.com/web/updates/2015/12/background-sync"
							>Background Sync API</a
						>
					</h3>
					<h3>Emulate via chrome devTools</h3>
					<h4>
						Enable BG Sync: <span class="bg-sync__text" hidden>Registered</span>
						<span class="custom__button custom__button-bg"> <button class="turn-on-sync">Register</button> </span>
					</h4>
					<ul>
						<li><b>Step 1: </b> Go offline in devTools and register BG Sync.</li>
						<li><b>Step 2: </b>Go to application tab in chrome devTools and navigate to serviceWorker tab.</li>
						<li><b>Step 3: </b>Go online and click `sync` button to emulate bg sync.</li>
						<li><b>Step 4: </b>Above card will be updated as per your input.</li>
					</ul>
				</div>

				<div class="card__spinner"></div>

				<div class="share__container">
					<h3>
						<a target="_blank" rel="noopener" href="https://developers.google.com/web/updates/2016/10/navigator-share">Web Share API</a>
					</h3>
					<button class="share">Share</button>
				</div>

				<div class="share__container">
					<h3>
						<a target="_blank" rel="noopener" href="https://developers.google.com/web/updates/2017/02/navigation-preload"
							>Navigation Preload</a
						>
					</h3>
					<ul>
						<li>
							<b>Step 1: </b>Toggle
							<a href="chrome://flags/#enable-experimental-web-platform-features" target="_blank" rel="noopener"
								>chrome://flags/#enable-service-worker-navigation-preload</a
							>
						</li>
						<li><b>OR </b></li>
						<li>
							<a href="https://github.com/jpchase/OriginTrials/blob/gh-pages/developer-guide.md">Try Origin Trial Token</a> in chrome
							stable.
						</li>
					</ul>
				</div>

				<div class="fab fab__push">
					<div class="fab__ripple"></div>
					<img class="fab__image" src="<?php echo base_url('assets/theme/images/push-off.png');?>" alt="Push Notification" />
				</div>

				<!-- Toast msg -->
				<div class="toast__msg"></div>
			</div>