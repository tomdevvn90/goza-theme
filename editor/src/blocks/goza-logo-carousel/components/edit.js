import GozaLogoCarousel from './block';
import GozaBlockControl from './blockcontrol';
import { Fragment } from '@wordpress/element';
import Inspector from './inspector';
import { MediaPlaceholder } from '@wordpress/block-editor';

const Edit = (props) => {
    const { attributes, setAttributes } = props
    const { images } = attributes

    return (
        <Fragment>
            <GozaBlockControl {...props} />
            <Inspector {...props} />
            <GozaLogoCarousel {...props}>
                <div className='block-inner block-editor'>
                    {images ? (
                        images.map((logo) => {
                            return (
                                <div className='goza-logo__item' key={logo.id}>
                                    <div className='goza-logo__item-image' >
                                        <img src={logo.url} alt={logo.alt} id={logo.id} />
                                    </div>
                                </div>
                            );
                        })
                    ) : (
                        <MediaPlaceholder
                            multiple={true}
                            onSelect={(media) =>
                                setAttributes({
                                    images: media,
                                })
                            }
                            onFilesPreUpload={(media) =>
                                setAttributes({
                                    images: media,
                                })
                            }
                            onSelectURL={false}
                            allowedTypes={['image']}
                            labels={{
                                title: 'Add Logos',
                            }}
                        />
                    )}
                </div>
                <ul class="slick-dots"><li><button type="button" id="slick-slide-control00"></button></li><li><button type="button" id="slick-slide-control01"></button></li></ul>
            </GozaLogoCarousel>
        </Fragment>
    )
}

export default Edit;