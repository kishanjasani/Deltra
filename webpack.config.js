const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const CssMinimizerWebpackPlugin = require( 'css-minimizer-webpack-plugin' );
const UglifyjsWebpackPlugin = require( 'uglifyjs-webpack-plugin' );

const isProduction = 'production' === process.env.NODE_ENV;

const JS_DIR = path.resolve( __dirname, 'assets/src/js' );
const IMG_DIR = path.resolve( __dirname, 'assets/src/img' );
const BUILD_DIR = path.resolve( __dirname, 'assets/build' );

const entry = {
	main: JS_DIR + '/main.js',
	single: JS_DIR + '/single.js',
};
const output = {
	path: BUILD_DIR,
	filename: 'js/[name].js',
};

const rules = [
	{
		test: /\.js$/,
		include: [ JS_DIR ],
		exclude: /(node_modules|bower_components)/,
		use: {
			loader: 'babel-loader',
		},
	},
	{
		test: /\.(s[ac]ss|css)$/i,
		exclude: /node_modules/,
		use: [
			MiniCssExtractPlugin.loader,
			{ loader: 'css-loader', options: { sourceMap: isProduction ? false : true } },
			{ loader: 'postcss-loader', options: { sourceMap: isProduction ? false : true } },
			{ loader: 'sass-loader', options: { sourceMap: isProduction ? false : true } },
		],
	},
	{
		test: /\.(png|svg|jpe?g|gif|ico)$/i,
		use: [
			{
				loader: 'file-loader',
				options: {
					name: 'img/[name].[ext]',
					publicPath: isProduction ? '../' : '../../',
				},
			},
		],
	},
	{
		test: /\.(woff(2)?|eot|ttf|otf|svg)$/i,
		type: 'asset/resource',
		generator: {
			filename: './library/fonts/[name][ext]',
		},
	},
];

const plugins = ( argv ) => [
	new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( 'production' === argv.mode ),
	} ),
	new MiniCssExtractPlugin( {
		filename: 'css/[name].css',
	} ),
];

module.exports = ( env, argv ) => ( {
	entry,
	output,
	devtool: 'source-map',
	module: {
		rules,
	},
	optimization: {
		minimizer: [
			new CssMinimizerWebpackPlugin(),
			new UglifyjsWebpackPlugin( {
				cache: false,
				parallel: true,
				sourceMap: ( 'production' === argv.mode ) ? false : true,
			} ),
		],
	},
	plugins: plugins( argv ),
	externals: {
		jquery: 'jQuery',
	},
} );
