import app from 'flarum/common/app';

app.initializers.add('hamzone/ip', () => {
  console.log('[hamzone/ip] Hello, forum and admin!');
});
