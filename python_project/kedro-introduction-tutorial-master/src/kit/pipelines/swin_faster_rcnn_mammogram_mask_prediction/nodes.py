import numpy as np
from PIL import Image
from mmdet.apis import inference_detector, init_detector
def predict_faster_result(img):
    check = 'data/06_models/swin/faster/epoch_4.pth'
    cfg = 'data/06_models/swin/faster/faster_rcnn_r101_caffe_fpn_1x_coco.py'
    model = init_detector(cfg, check, device='cpu')
    img = np.asarray(img)
    img = np.asarray([ np.asarray(img), np.asarray(img), np.asarray(img)]).transpose(1,2,0)
    result5 = inference_detector(model, img)
    im = model.show_result(img, result5, score_thr=0.1,font_size=10)
    im = Image.fromarray(im)
    return im


