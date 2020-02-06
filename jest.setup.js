/* eslint-disable no-undef */
// mock mw object
global.mw = {
	message: jest.fn().mockReturnValue( {
		parse: jest.fn()
	} )
};
