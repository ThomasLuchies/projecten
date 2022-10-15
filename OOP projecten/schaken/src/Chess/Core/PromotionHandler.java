package Chess.Core;

import Chess.Core.Pieces.Pawn;

/**
 * Implementor handles promotion of the given pawn.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public interface PromotionHandler
{
    void handlePromotion(Pawn pawn, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound;
}