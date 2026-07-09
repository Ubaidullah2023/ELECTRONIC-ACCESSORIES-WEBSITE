<?php if (!defined('ABSPATH')) exit; ?>
<div class="modal" data-signin-modal aria-hidden="true">
  <div class="modal-backdrop" data-close-signin></div>
  <div class="modal-panel" role="dialog" aria-label="Sign in">
    <div class="modal-head">
      <div class="modal-title">Sign In</div>
      <button class="icon-btn" type="button" aria-label="Close" data-close-signin>
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M6 6l12 12M18 6 6 18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        </svg>
      </button>
    </div>
    <div class="auth-tabs">
      <button class="auth-tab is-active" type="button" data-auth-tab="login">Login</button>
      <button class="auth-tab" type="button" data-auth-tab="register">Register</button>
    </div>
    <div data-auth-pane="login">
      <form class="modal-form" action="<?php echo esc_url(wp_login_url(home_url('/'))); ?>" method="post">
        <div class="field">
          <label for="signinEmail">Phone Number or Email</label>
          <input id="signinEmail" name="log" type="text" autocomplete="username" required />
        </div>
        <div class="field" style="margin-top:10px;">
          <label for="signinPass">Password</label>
          <input id="signinPass" name="pwd" type="password" autocomplete="current-password" required />
        </div>
        <button class="btn btn-primary" style="margin-top:14px;width:100%;" type="submit">Login</button>
        <div class="auth-foot">
          <span class="muted">New user?</span>
          <button class="auth-link" type="button" data-switch-tab="register">Register here</button>
        </div>
      </form>
    </div>
    <div data-auth-pane="register" style="display:none;">
      <p class="muted" style="margin-bottom:12px;">Create your WordPress account to track orders.</p>
      <a class="btn btn-primary" style="width:100%;" href="<?php echo esc_url(wp_registration_url()); ?>">Create Account</a>
      <div class="auth-foot">
        <span class="muted">Already a member?</span>
        <button class="auth-link" type="button" data-switch-tab="login">Login here</button>
      </div>
    </div>
  </div>
</div>
